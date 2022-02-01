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
    
    <img src="{{asset('storage/' . $photo->thumbnail )}}" alt="">

    <form action="{{route('photos.update', $photo->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <input type="file" name="photo" id="photo">
        </div>

        <div>
            <button type="submit">Update</button>
            <button type="reset">Reset Details</button>
        </div>
    </form>


</body>
</html>