@if (Auth::user()->usertype == 1)
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Categories</title>
        <link rel="stylesheet" href="{{ asset('csshome/categories.css') }}">
    </head>

    <body>
        <h1>All products</h1>
        <table border=1>
            <tr>
                <th>Name</th>
                <th>description</th>
                <th>price</th>
                <th>quantity</th>
                <th>category name</th>
                <th>image</th>
                <th>Delete product</th>
                <th>Edit product</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <img src="{{ asset('images/' . $product->image) }}" width="100">
                    </td>
                    <td>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">

                            @method('DELETE')
                            @csrf
                            <button type="submit">x</button>

                        </form>
                    </td>
                    <td>
                        <form action="{{ route('product.update', $product->id) }}">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </body>

    </html>
@else
    @php
        return redirect()->route('returnmainpage');
    @endphp
@endif
