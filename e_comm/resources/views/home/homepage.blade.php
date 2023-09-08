<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="csshome/index.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas Neue">
    <title>Main page</title>
</head>

<body>
    <!---------------Header container------------------>
    <div class="header-container">
        <a href="#" class="logo"><i class='bx bx-headphone'></i> Electro Store</a>

        <ul class="navbar-container">
            @if (Route::has('login'))
                @auth
                    <li><a href="{{ route('showcart') }}"><span><i class='bx bx-cart-alt'></i></span></i> My Cart</a></li>
                    <li>
                        <x-app-layout>

                        </x-app-layout>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            @endif



        </ul>
    </div>

    <!---------------Home container------------------>
    <div class="home-container" id="home">
        <h1>The home of gamers !</h1>
    </div>

    @if (session('success'))
        <div id="alert-success">
            <li> {{ session('success') }}</li>
        </div>
    @endif

    <!---------------search container------------------>
    <div class="search-container">
        <i class='bx bx-search-alt-2'></i>
        <input type="text" id="searchInput" placeholder="Search for products...">
    </div>


    <!-----------------------Products container----------------->

    <div class="container">
        <div class="meteor-container">
            <img src="images/meteor.png" alt="Meteor 1" class="meteor">
            <img src="images/meteor.png" alt="Meteor 2" class="meteor2">
            <img src="images/meteor.png" alt="Meteor 3" class="meteor3">

        </div>
        @foreach ($categories as $category)
            <h1 id="categoryname">{{ $category->name }}</h1>
            <div class="products">
                <div class="product-container">
                    @foreach ($category->products as $product)
                        <div class="product">
                            @if ($product->quantity > 0)
                                <a href="{{ route('product.show', $product->id) }}">
                                    <img src="{{ asset('images/' . $product->image) }}" width="200">
                                    <p>{{ $product->name }}</p>
                                </a>
                            @else
                                <div class="out-of-stock">
                                    <img src="{{ asset('images/' . $product->image) }}" width="200">
                                    <p>{{ $product->name }} (Out of Stock)</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <!-----------------------footer----------------->
    <footer>
        <div class="footer-content">

            <div class="contact-info">
                <h2>All Copyrights Reserved @ electostore.com</h2>
                <p>LinkedIn: <a href="https://www.linkedin.com/in/youssef-salem-67a0a2233/" target="_blank"><i
                            class='bx bxl-linkedin'></i></a></p>
                <p>Phone:+201097742237</p>
            </div>
        </div>
    </footer>





    <script src="pageinteractions/home.js"></script>
</body>

</html>
