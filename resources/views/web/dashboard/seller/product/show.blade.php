<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$product->name}}</title>
    <style>
        div{
            display: block;
            padding: 2px;
        }
    </style>
</head>
<body>

    <a href="{{route('products.edit', $product->id)}}">Edit This Product </a>

    <h1>{{$product->name}}</h1>
    <div>
        <h3>Price : </h3>
        {{$product->price}}
    </div>
    <div>
        <h3>Category : </h3>
        {{$product->category->name}}
    </div>
    <div>
        <h3>Store</h3>
        {{$product->store->name}}
    </div>
    <div>
        <h3>Status</h3>
        {{$product->status}}
    </div>

    <div>
     <hr>

        <img src="{{asset('storage/'.$product->photo->thumbnail)}}" alt="">

        ..has {{$product->photos->count()}} addition Photos
    </div>
  
</body>
</html>