<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('store_product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control">
        </div>

        <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" class="form-control">
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" placeholder="Price" class="form-control">
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" placeholder="Stock" class="form-control">
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit data</button>
    </form>
</body>
</html>