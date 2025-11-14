@extends("layouts.app")
@section("title","Edit A Product")
@section("content")
    <div class="container mt-3">
        <h1>Edit Product</h1>
        <form action="/update/{{ $product->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value={{ $product->name }} class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" value={{ $product->price }} class="form-control" id="price"  name="price" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" value={{ $product->quantity }} class="form-control"  id="quantity" required >
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file"  name="image" class="form-control"  id="image">
                <img width="200" class="my-2" style="border-radius: 15px;" src="{{ asset("storage/".$product->image) }}" alt="">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ $product->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-4"><i class="bi bi-pencil"></i> Update</button>
            <a href="/index" class="btn btn-secondary mb-4"><i class="bi bi-x-circle"></i> cancel</a>
        </form>
    </div>
@endsection
