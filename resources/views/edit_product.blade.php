<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <php? $edit = DB::table('product')->where('id', 15)->get() ?> --}}
    {{-- @foreach ($products as $product) --}}
        <form action="{{ route('update_product',$product->id) }}" method="post" enctype="multipart/form-data">
            {{-- @method('patch') --}}
            @csrf
            {{-- <input type="hidden" name="id" value="{{ $edit->id }}"> <br/> --}}
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control"
                    value="{{ $edit->name }}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" placeholder="Description" class="form-control"
                    value="{{ $edit->description }}">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" placeholder="Price" class="form-control"
                    value={{ $edit->price }}>
            </div>
            <div class="form-group">
                <label>Stock</label>
                <input type="number" name="stock" placeholder="Stock" class="form-control"
                    value={{ $edit->stock }}>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit data</button>
        </form>
    {{-- @endforeach --}}
</body>
</html>