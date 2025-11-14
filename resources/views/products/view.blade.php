@extends("layouts.app")
@section("title","Product View")
@section("content")
<div class="card w-50 my-4 mx-auto  d-flex" style="width: ; ">
    <div class="card-body">
      <h5 class="card-title"> Name: {{ $product->name }}</h5>
      <h6 class="card-subtitle mb-2 text-muted">Added At: {{ $product->created_at }}</h6>
      <p class="card-text">{{ $product->description }}</p>
      <img src="{{ asset("storage/".$product->image) }} " width="350" class="d-block my-3" style=" border-radius:10px;" alt="">
      <a href="/edit/{{ $product->id }}" class="btn btn-outline-warning">Edit</a>
      <a href="/index" class="btn btn-secondary">Cencel</a>
    </div>
  </div>
@endsection
