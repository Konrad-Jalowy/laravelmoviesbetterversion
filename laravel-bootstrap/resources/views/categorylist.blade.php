@extends('layouts.app')
@section('content')
<div class="container">
<div class="text-center mb-3">
    <h3>Categories</h3>
</div>
<table class="table">
  <thead>
    <tr>
    <th scope="col">ID</th>  
      <th scope="col">Name</th>
      <th scope="col">Movies count:</th>
      <th scope="col">Created At</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{ $category->name }}</td>
      <td>{{ $category->movies_count }}</td>
      <td>{{$category->created_at}} ({{ Carbon\Carbon::parse($category->created_at)->diffForHumans()}}) </td>
      <td><a href="{{ route('category.movies', $category->id) }}"><button class="btn btn-primary">Details</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection