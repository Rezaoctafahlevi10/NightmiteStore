<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($products as $product)
    <p>Name : {{ $product->name }}</p>
    <p>Description:{{ $product->description }} </p>
    <p>Rp: {{ $product->price}}</p>
    <p>Stock : {{ $product->stock }}</p>
    <img src="{{ url('storage/' . $product->image) }}"  height="100px" alt=""> 
    
    {{-- <form action="/product" method="get">
        <button type="submit">Show detail</button>
    </form> --}}
    {{-- <form action="{{ route('edit_product')}}" method="get">
        <button type="submit">Edit Product</button>
    </form> --}}
    <form action="{{ route('edit_product', $product->id) }}" method="get">
            <button type="submit" class="btn btn-primary">Edit Product</button>
    </form>
    <form action="{{ route('delete_product', $product->id) }}" method="post">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger mt-2">Delete product</button>
    </form>
    <form action="{{ route('carts', $product) }}" method="post">
        @csrf
        <input type="number"name="amount" value="1">
        <button type="submit">Add to carts</button>
    </form>
@endforeach
</body>
</html>