<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stores</title>
</head>
<body>

    <a href="{{route('stores.create')}}">Add a Store </a>

    <ol>
        @forelse ($stores as $store)
            <li>
                <a href="{{route('stores.show', $store->id)}}"> {{$store->name}} </a>
            </li>
        @empty
            <li>
                No stores
            </li>
        @endforelse
    </ol>
   
</body>
</html>