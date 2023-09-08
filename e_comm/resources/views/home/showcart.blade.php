<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('csshome/cart.css') }}">
    <title>cart</title>
</head>

<body>
    <h1>Hope you enjoyed your visit and we are sure you will enjoy the games</h1>
    <?php $totalprice = 0; ?>
    <table border=2>
        <tr>
            <th>product</th>
            <th>qunatity bought</th>
            <th>total price</th>
            <th>Remove from cart</th>

        </tr>
        @foreach ($cart as $cart)
            <tr>
                <td>
                    <img src="{{ asset('images/' . $cart->product->image) }}" width="100">
                </td>
                <td>{{ $cart->quantity_bought }}</td>
                <td>{{ $cart->price }}</td>
                <td>
                    <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">

                        @method('DELETE')
                        @csrf
                        <button type="submit">x</button>

                    </form>
                </td>
                <?php $totalprice += $cart->price; ?>
            </tr>
        @endforeach
        <tr id="finalcost">
            <td colspan="4">Total Cart Price : {{ $totalprice }}</td>
        </tr>
    </table>


    <a href="{{ route('orderitems') }}" class="btn-order">Order Now !</a>

</body>

</html>
