<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\View\View;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;



class DashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $pic = $user-> avatar;
        // Fetch categories with the count of their products
        $categories = Category::withCount('products')->get();

        // Prepare data for the category chart
        $categoryLabels = $categories->pluck('name');
        $productCounts = $categories->pluck('products_count');

        // Fetch stores with the count of their products
        $stores = Store::withCount('products')->get();

        // Prepare data for the store chart
        $storeLabels = $stores->pluck('name');
        $storeCounts = $stores->pluck('products_count');

        return view('dashboard', [
            'pic' => $pic,
            'user' => $user,
            'categoryLabels' => $categoryLabels,
            'productCounts' => $productCounts,
            'storeLabels' => $storeLabels,
            'storeCounts' => $storeCounts
        ]);
        // dd($user);
        // return view('dashboard', compact('user','pic'));

    }

    public function customers(): View
    {
        $customers = Customer::paginate(20);
        return view('customers.index',compact('customers'));

    }

    public function suppliers(): View
    {
        return view('suppliers.index', [
            'suppliers' => Supplier::all()
        ]);
    }

    public function products(): View
    {
        return view('products.index', [
            'products' => Product::with(['category', 'supplier', 'stock'])->get()
        ]);
    }

    public function productsBySupplier(): View
    {
        $suppliers = Supplier::all();
        return view('products.by-supplier', compact('suppliers'));

    }

    public function getProductsBySupplier(Supplier $supplier)
    {

        $products = Product::with(['stock','category'])
        ->where('supplier_id', $supplier->id)
        ->get();
        return view('products._products_by_supplier', compact('products'));
    }

    public function productsByStore(): View
    {
        $stores = Store::all();
        return view('products.by-store', compact('stores'));
    }

    public function getProductsByStore(Store $store)
    {
        $products = Product::with(['category', 'stock'])
            ->whereHas('stock', function($query) use ($store) {
                $query->where('store_id', $store->id);
            })
            ->get();

        return response()->json($products);
    }

    public function orders()
    {
        return view("orders.index");
    }


   public function saveCookie()
   {
      $name = request()->input("txtCookie");
      Cookie::queue("UserName",$name,6000000); // or Cookie::put("UserName",$name,6000000);

      return redirect()->back();
   }


   public function saveSession(Request $request)
   {
            $name = $request->input("txtSession");
            $request->session()->put('SessionName', $name);
            return redirect()->back();
   }
   public function saveAvatar()
   {

    request()->validate([
        'avatarFile'=>'required|image',
            ]);
    $ext = request()->avatarFile->getClientOriginalExtension();
    $name = Str::random(30).time().".".$ext;
    request()->avatarFile->move(public_path('storage/avatars'),$name);
    $user = Auth::user();
    $user->update(['avatar'=>$name]);
    return redirect()->back();
   }


}
