@extends('layouts.app')
@section('content')
<div class="text-center">
<h3>{{$category->name}} - movies:</h1>
<form action="{{Request::url()}}" id="filter-form" method="GET">
  <label for="filter" class="form-label">Filter by:</label>
<select class="form-select w-25 mx-auto" aria-label="Default select example" id="filter">
  <option>Show all</option>
  <option value="1">Best</option>
  <option value="2">Worst</option>
  <option value="3">Longest</option>
  <option value="3">Shortest</option>
  <option value="3">Newest</option>
  <option value="3">Oldest</option>
</select>
</form>
</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
    <th scope="col">ID</th>  
      <th scope="col">Title</th>
      <th scope="col">Grade</th>
      <th scope="col">Created at</th>
      <th scope="col">Published at</th>
      <th scope="col">Length</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($movies as $movie)
    <tr>
      <th scope="row">{{$movie->id}}</th>
      <td>{{ $movie->title }}</td>
      <td>{{ $movie->grade }}</td>
      <td>{{$category->created_at}} ({{ Carbon\Carbon::parse($category->created_at)->diffForHumans()}}) </td>
      <td>{{$movie->date_of_publishing}} ({{ Carbon\Carbon::parse($movie->date_of_publishing)->diffForHumans()}}) </td>
      <td>{{ $movie->movie_length }}</td>
      <td><a href="{{route('movie.detail', $movie->id)}}"><button class="btn btn-primary">Details</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@push('js_after')

@vite(['resources/js/filtermoviesincategories.js'])
@endpush
@endsection