<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    $product_user
    @foreach ($product_user as $product_users)
    <p>Name : {{ $product_users->name }}</p>
    <p>Description:{{ $product_users->description }} </p>
    <p>Rp: {{ $product_users->price}}</p>
    <p>Stock : {{ $product_users->stock }}</p>
    <img src="{{ url('storage/' . $product_users->image) }}"  height="100px" alt="">   
@endforeach
</body>
</html>