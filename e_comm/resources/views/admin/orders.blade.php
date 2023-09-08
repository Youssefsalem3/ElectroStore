<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('csshome/categories.css') }}">
    <title>Document</title>
</head>

<body>
    <h1>All orders</h1>
    <table border=1 id="ordertable">
        <tr>
            <th>Order_id</th>
            <th>User_name</th>
            <th>User_Address</th>
            <th>Product_name</th>
            <th>quantity</th>
            <th>price</th>

            <th>Delete order</th>
        </tr>
        @foreach ($orders as $orders)
            <tr>
                <td>{{ $orders->id }}</td>
                <td>{{ $orders->user->name }}</td>
                <td>{{ $orders->user->address }}</td>
                <td>{{ $orders->product->name }}</td>
                <td>{{ $orders->quantity_bought }}</td>
                <td>{{ $orders->price }}</td>
                <td>
                    <form action="{{ route('order.destroy', $orders->id) }}" method="POST">

                        @method('DELETE')
                        @csrf
                        <button type="submit">x</button>

                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
