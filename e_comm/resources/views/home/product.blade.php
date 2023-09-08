<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('csshome/product.css') }}">
</head>

<body>

    <div class="product-container ">
        <div class="product-image">
            <img src="{{ asset('images/' . $product->image) }}" width="500">
        </div>

        <div class="product-details">
            <h2>Game name: {{ $product->name }}</h2>
            <br>

            <h2>Description: {{ $product->description }}</h2>
            <br>

            <h2>price: {{ $product->price }} $</h2>
            <br>

            <h2>Category: {{ $product->category->name }}</h2>
            <br>

            <h2>Available quantites: {{ $product->quantity }}</h2>
            <br>
            <br>
            <form id="addtocart" action="{{ route('add_to_cart', $product->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="Quantity">Quantity to Buy:</label>
                    <input type="number" name="Quantity" max="{{ $product->quantity }}" min="1"
                        class="form-control" required>
                    <button type="submit" class="btn">Add to Cart</button>
                </div>
            </form>

        </div>
    </div>
</body>

</html>
