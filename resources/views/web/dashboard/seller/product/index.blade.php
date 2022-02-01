<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>

    <a href="{{route('products.create')}}">Add a Product </a>

    <ol>
        @forelse ($products as $product)
            <li>
                <a href="{{route('products.show', $product->id)}}"> {{$product->name}} </a>
            </li>
        @empty
            <li>
                No Products
            </li>
        @endforelse
    </ol>
    {{$products->links()}}
</body>
</html>