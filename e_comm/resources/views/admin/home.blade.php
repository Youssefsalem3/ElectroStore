<?php use App\Models\Product;
use App\Models\User;
?>

<div class="dash">
    <!-- Toggle button for the sidebar -->
    <button id="toggleButton"><i class='bx bx-menu'></i></button>
    <div id="lay">
        <x-app-layout>

        </x-app-layout>
    </div>

</div>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin panel</title>
    <link rel="stylesheet" href="csshome/adminindex.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
</head>

<body>
    @if ($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div id="alert-success">
            <li> {{ session('success') }}</li>
        </div>
    @endif
    <!--sidebar---->

    <div class="sidebar" id="sidebar">
        <ul>
            <button id="toggleButtonclose"><i class='bx bx-menu'></i></button>

            <li id="addProduct">Add a Product</li>

            <li id="addCategory">Add a Category</li>

            <li><a href="{{ route('categories.showall') }}">Show all categories</a></li>
            <li><a href="{{ route('products.showall') }}">Show all products</a></li>
            <li><a href="{{ route('orders.showall') }}">Show all orders</a></li>
        </ul>
    </div>



    <div class="content">

        <!--------------------------------------------------Adding a category ------------------------------------>
        <form id="addcategoryform" action="{{ route('admin.storeCategory') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <label for="Categoryname">Category name:</label>
            <br>
            <input type="text" name="Categoryname" placeholder=" Enter Category Name"
                style="display: block; margin-bottom: 10px;">
            <br>
            <input type="submit" value="Add category">


        </form>

        <!--------------------------------------------------Adding a Product ------------------------------------>
        <form id="addproductform" action="{{ route('admin.storeProduct') }}" method="post"
            enctype="multipart/form-data">
            @csrf

            <label for="ProductName">Product Name:</label>
            <br>
            <input type="text" name="ProductName" placeholder=" Enter Product Name"
                style="display: block; margin-bottom: 10px;">
            <br>

            <p>Product description</p>
            <br>
            <textarea name="ProductDesc" id="ProductDesc" cols="45" rows="3"></textarea>
            <br>
            <label for="Image">Product Image:</label>
            <br>
            <input type='file' name='Image'>
            <br>

            <label for="Quantityinstock">Quantity in stock:</label>
            <br>
            <input type="number" name="Quantityinstock" placeholder=" Enter the quantity"
                style="display: block; margin-bottom: 10px;">
            <br>

            <label for="price">Product price:</label>
            <br>
            <input type="number" name="price" placeholder=" Enter the price"
                style="display: block; margin-bottom: 10px;">
            <br>

            <label for="categoryid">Product Category id:</label>
            <br>
            <input type="number" name="categoryid" placeholder=" Enter the category id"
                style="display: block; margin-bottom: 10px;">
            <br>

            <input type="submit" value="Add product">



        </form>

        <!------Stat calculations------>
        <?php $totalwinnings = 0; ?>
        @foreach ($orders as $order)
            <?php $totalwinnings += $order->price; ?>
        @endforeach

        <?php
        $orderArray = $orders->toArray();

        $productCounts = array_count_values(array_column($orderArray, 'product_id'));

        arsort($productCounts);
        $mostOrderedProductId = key($productCounts);
        $mostOrderedProductCount = current($productCounts);
        $product = Product::find($mostOrderedProductId);
        ?>
        <?php
        $orderArray = $orders->toArray();

        $userCounts = array_count_values(array_column($orderArray, 'user_id'));

        arsort($userCounts);
        $mostcommonuser = key($userCounts);
        $user = User::find($mostcommonuser);
        ?>
        <!-- Statistics Dashboard -->
        <h1 id="stathead">Electro store Statistics</h1>
        <div class="statistics-dashboard" id="statdash">


            <div class="statistic-card1">
                <h3>Total Order sales</h3>
                <p>{{ $totalwinnings }}</p>
            </div>

            <div class="statistic-card2">
                <h3>Our top sold product by users is</h3>
                <p>{{ $product->name }}</p>
            </div>

            <div class="statistic-card3">
                <h3>Our top Customer is</h3>
                <p>{{ $user->name }}</p>
            </div>




        </div>


    </div>

    <script src="pageinteractions/admin.js"></script>
</body>

</html>
