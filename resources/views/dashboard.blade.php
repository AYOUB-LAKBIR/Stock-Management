@extends('layouts.app')
@section('content')
<div class="container">
     {{-- button logout --}}
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger float-end">@lang('Logout')</button>
                    </form>
     {{-- Button Profil --}}
        <div>
            <a href="{{ route('profile') }}" class="btn btn-outline-success me-2 float-end">@lang('My Profile')</a>
        </div>
    {{-- welcome card --}}
    <div class="welcome-card float-start ">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
                <h4>@lang('Hello'), {{ $user->name }} !</h4>
                <p>@lang('You are now connected to your account')</p>
            </div>
<br><br><br>
<div class="dashboard-container m-auto w-50">
    <h2 class="">@lang('Welcome')</h2>
    <p class="lead mb-4 ">@lang('Slogon')</p>
</div>

{{-- buttons --}}
<div class="border p-4 rounded shadow-sm ">
    <div class="d-flex justify-content-center gap-3">

        <a href="/customers" class="btn btn-warning  shadow-sm">@lang('List of Customers')</a>
        <a href="/suppliers" class="btn btn-warning btn-lg shadow-sm">@lang('List of Suppliers')</a>
        <a href="{{ route('products.index') }}" class="btn btn-warning btn-lg shadow-sm">@lang('List of Products')</a>
        <a href="/products-by-category" class="btn btn-warning btn-lg shadow-sm">@lang('Products by Category')</a>
        <a href="/products-by-supplier" class="btn btn-warning btn-lg shadow-sm">@lang('Products by Supplier')</a>
        <a href="/products-by-store" class="btn btn-warning btn-lg shadow-sm">@lang('Products by Store')</a>
        <a href="{{ route('orders.index') }}" class="btn btn-warning btn-lg shadow-sm">@lang('Orders details by customer')</a>
    </div>

    <br><br>

    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('ordered.products') }}" class="btn btn-info mb-3">@lang('View Ordered Products')</a>
        <a href="{{ route('same.products.customers') }}" class="btn btn-info mb-3">@lang('Customers Who Ordered Same Products as Antonina Dibbert')</a>
        <a href="{{ route('products.orders_count') }}" class="btn btn-info mb-3">@lang('Number of Orders per Product')</a>
        <a href="{{ route('products.more_than_6_orders') }}" class="btn btn-info mb-3">@lang('Products with More Than 6 Orders')</a>
        <a href="{{ route('orders.totals') }}" class="btn btn-info mb-3">@lang('Total Amount per Order')</a>
        <a href="{{ route('orders.greater_than_60') }}" class="btn btn-info mb-3">@lang('Orders with Total Greater Than Order 60')</a>
    </div>

    <br><br>

    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('customers.orders') }}" class="btn btn-secondary mb-3">@lang('Customers per Order')</a>
        <a href="{{ route('suppliers.products') }}" class="btn btn-secondary mb-3">@lang('Suppliers who delivered products ordered by Antonina Dibbert')</a>
        <a href="{{ route('products.same_stores') }}" class="btn btn-secondary mb-3">@lang('Products stored in same stores as Bud Hahn products')</a>
        <a href="{{ route('products.countbystore') }}" class="btn btn-secondary mb-3">@lang('Number of products per store')</a>
        <a href="{{ route('store.value') }}" class="btn btn-secondary mb-3">@lang('Value of each store')</a>
        <a href="{{ route('sotre.greater_than_lind') }}" class="btn btn-secondary mb-3">@lang('Stores with value greater than Lind-Gislason')</a>
    </div>


</div>

<br><br>

{{-- Cookie AND Session : --}}

<div class="d-flex justify-content-around mb-4 ">
    {{-- Cookie --}}
    <div>
        <div>
            <h1 class="text-center">@lang('Cookie') :</h1>
            <h3>
                @lang('Hello')
                @if(Cookie::has("UserName"))
                        {{Cookie::get("UserName")}}
                @endif
            </h3>
        </div>
        <div>
            <form method="POST" action="saveCookie">
                @csrf
                <label for="txtCookie">@lang('Type your name')</label>
                <input type="text" id="txtCookie" name="txtCookie" />
                <button class="btn btn-outline-danger">@lang('Save Cookie')</button>
            </form>
        </div>
    </div>
    {{-- Session --}}
    <div class="">
        <div>
            <h1 class="text-center">@lang('Session') :</h1>
            <h3>
                @lang('Hello')
                @if(Session::has("SessionName"))
                        {{Session("SessionName")}}
                @endif
            </h3>
        </div>
        <div>
            <form method="POST" action="saveSession">
                @csrf
                <label for="txtSession">@lang('Type your name')</label>
                <input type="text" id="txSession" name="txtSession" />
                <button class="btn btn-outline-danger">@lang('Save Session')</button>
            </form>
        </div>
    </div>
</div>
<br><br>
{{-- Avatar upload --}}
<div class="text-center">
    <form method="POST" action="saveAvatar" enctype="multipart/form-data">
        @csrf
        <label for="avatarFile">@lang('Choose your picture')</label>
        <input type="file" id="avatarFile" name="avatarFile" />
        <button class="btn btn-outline-primary">@lang('Save picture for your account')</button>

        <img style="width:200px; border-radius:50%" src="{{"storage/avatars/".$pic}}" alt="">
    </form>
</div>

</div>
@endsection
