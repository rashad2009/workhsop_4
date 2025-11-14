@extends("layouts.app")
@section("title","Home Page")
@section("content")
<div class="container mt-4">
    <div class="d-flex align-items-center justify-content-between">
        <h1>Products List</h1>
        <a href="/create" class="btn btn-primary">Add New Product</a>
    </div>
@if (session("res"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle-fill"></i> {{ session("res") }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if (session("upd"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle-fill"></i> {{ session("upd") }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>



@endif
@if (session("del"))

  {{-- delete flash --}}
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="bi bi-x-circle"></i> {{ session("del") }}
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>

@endif

    {{-- table --}}
    @if ($products->count()>0)

    <table class=" table table-stripped  table-hover mt-4 ">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product )
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td><img src="{{ asset("/storage/".$product->image ) }}" style="border-radius:20px;" alt="" width="80" height="40"></td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="/edit/{{ $product->id }}" class="btn btn-warning">Edit</a>
                    <a href="/show/{{$product->id}}" class="btn btn-info">View</a>
                    <form action="/delete/{{ $product->id }}" class="form-inline" method="post">
                        @csrf
                        @method("delete")
                        <button type="submit" onclick="confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
        @else
        <div class="alert alert-info alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">

            <p> Ohh! There is no data yet.</p>
            <p>MadeBy | Rashad Diab</p>
         </div>
        @endif
</div>
@endsection
