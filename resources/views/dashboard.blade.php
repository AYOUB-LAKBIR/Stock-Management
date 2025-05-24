@extends('layouts.app')
@section('content')
<div class="container">
     {{-- button logout --}}
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger float-end">Se déconnecter</button>
                    </form>
     {{-- Button Profil --}}
        <div>
            <a href="{{ route('profile') }}" class="btn btn-primary me-2 float-end">Mon profil</a>
        </div>
    {{-- welcome card --}}
<div class="dashboard-container text-center">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="welcome-card float-start ">
                <h4>Bienvenue, {{ $user->name }} !</h4>
                <p>Vous êtes maintenant connecté à votre compte.</p>
            </div>

    <h2 class="display-4 mb-4">@lang("Welcome")</h2>
    <p class="lead mb-4">@lang("Slogon")</p>
</div>

{{-- buttons --}}

<div class="d-flex justify-content-center gap-3">
        <a href="/customers" class="btn btn-primary btn-lg shadow-sm">@lang("List of Customers")</a>
        <a href="/suppliers" class="btn btn-success btn-lg shadow-sm">{{ __("List of Suppliers") }}</a>
        <a href="{{ route('products.index') }}" class="btn btn-info btn-lg shadow-sm">{{ trans("List of Products")
            }}</a>
        <a href="/products-by-category" class="btn btn-warning btn-lg shadow-sm">Products by Category</a>
        <a href="/products-by-supplier" class="btn btn-secondary btn-lg shadow-sm">Products by Supplier</a>
        <a href="/products-by-store" class="btn btn-dark btn-lg shadow-sm">Products by Store</a>
        <a href="{{ route('orders.index') }}" class="btn btn-danger btn-lg shadow-sm">Orders details by customer</a>



    </div>
    <br><br>
    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('ordered.products') }}" class="btn btn-info mb-3">View Ordered Products (Eloquent join
            example)</a>
        <a href="{{ route('same.products.customers') }}" class="btn btn-warning mb-3">Customers Who Ordered the Same
            Products as Annabel Stehr</a>
        <a href="{{ route('products.orders_count') }}" class="btn btn-dark mb-3">Show Number of Orders per Product</a>
        <a href="{{ route('products.more_than_6_orders') }}" class="btn btn-primary mb-3">Products with More Than 6
            Orders</a>
        <a href="{{ route('orders.totals') }}" class="btn btn-danger mb-3">Show Total Amount per Order</a>
        <a href="{{ route('orders.greater_than_60') }}" class="btn btn-secondary mb-3">Orders with Total Greater Than
            Order 60</a>

    </div>

    <br><br>
    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('customers.orders') }}" class="btn btn-info mb-3"> 1 - clients par commande</a>
        <a href="{{ route('suppliers.products') }}" class="btn btn-warning mb-3">liste des founisseurs qui ont livré les produits commandé par ‘Annabel Stehr’</a>
        <a href="{{ route('products.same_stores') }}" class="btn btn-dark mb-3">liste des produits stockées dans les memes depots que les produits fournis par ‘Scottie Crona’</a>
        <a href="{{ route('products.countbystore') }}" class="btn btn-primary mb-3">nombre des produits par depot</a>
        <a href="{{ route('store.value') }}" class="btn btn-danger mb-3">valeur de chaque depot</a>
        <a href="{{ route('sotre.greater_than_lind') }}" class="btn btn-secondary mb-3">depots qui ont une valeur surpérieur a la valeur du depot ‘Lind-Gislason’</a>
    </div>
</div>
</div>
<br><br>

{{-- Cookie AND Session : --}}

<div class="d-flex justify-content-around mb-4 ">
    {{-- Cookie --}}
    <div>

        <div>
            <h1 class="text-center">Cookie :</h1>
            <h3>
                Hello
                @if(Cookie::has("UserName"))
                        {{Cookie::get("UserName")}}
                @endif
            </h3>
        </div>
        <div>
            <form method="POST" action="saveCookie">
                @csrf
                <label for="txtCookie">Type your name</label>
                <input type="text" id = "txtCookie" name = "txtCookie" />
                <button class="btn btn-outline-danger ">Save Cookie</button>
            </form>
        </div>
    </div>
    {{-- Session --}}
    <div class="">
        <div>
            <h1 class="text-center">Session :</h1>
            <h3>
                Hello
                @if(Session::has("SessionName"))
                        {{Session("SessionName")}}
                @endif
            </h3>
        </div>
        <div>
            <form method="POST" action="saveSession">
                @csrf
                <label for="txtSession"> Type your name </label>
                <input type="text" id = "txSession" name = "txtSession" />
                <button class="btn btn-outline-danger"> Save Session </button>
            </form>
        </div>
    </div>
</div>
<br><br>
{{-- Avatar upload --}}
<div class="text-center">
    <form method="POST" action="saveAvatar"  enctype="multipart/form-data" >
        @csrf
        <label for="avatarFile"> Choose your picture </label>
        <input type="file" id = "avatarFile"  name = "avatarFile" />
        <button class="btn btn-outline-primary">Save picture for your account </button>

        <img style = "width:200px; border-radius:50%" src="{{"storage/avatars/".$pic}}" alt="">
    </form>
</div>



</div>
@endsection
