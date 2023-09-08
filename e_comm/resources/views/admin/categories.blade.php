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
        <h1>All categories</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Delete this category</th>
            </tr>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST">

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
@else
    @php
        return redirect()->route('returnmainpage');
    @endphp
@endif
