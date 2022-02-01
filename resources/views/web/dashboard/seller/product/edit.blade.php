<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    <style>
        div{
            display: block;
            padding: 1%;
        }
    </style>
</head>
<body>
    <a href="{{route('photos.edit', $product->photo->id)}}">Edit This Product's Photo </a>
    
    <form action="{{route('products.destroy', $product->id)}}" id="deleteProduct" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="product" value="{{$product->id}}">
    </form>

    <a href="#" onclick="((event)=>{event.preventDefault(); document.getElementById('deleteProduct').submit() } )(event)" >Delete This Product </a>
    <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <input type="text" name="name" placeholder="Name" value="{{$product->name}}">
        </div>
        <div>
            <textarea name="description" id="description" cols="30" rows="10">{{$product->description->description}}</textarea>
        </div>
        <div>
            Categories: 
            <select name="category" id="category">
                <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            Store: 
            <select name="store" id="store">
                <option value="{{$product->store->id}}">{{$product->store->name}}</option>
                @foreach ($stores as $store)
                    <option value="{{$store->id}}">{{$store->name}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit">Update</button>
            <button type="reset">Reset Details</button>
        </div>
    </form>


</body>
</html>