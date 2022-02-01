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
    
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="text" name="name" placeholder="Name">
        </div>
        <div>
            <textarea name="description" id="description" cols="30" rows="10">Description</textarea>
        </div>
        <div>
            Categories: 
            <select name="category" id="category">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            Store: 
            <select name="store" id="store">
                @foreach ($stores as $store)
                    <option value="{{$store->id}}">{{$store->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="file" name="photo" id="photo">
        </div>

        <div>
            <button type="submit">Create</button>
            <button type="reset">Reset Details</button>
        </div>
    </form>


</body>
</html>