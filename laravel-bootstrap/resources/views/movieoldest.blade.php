@extends('layouts.app')
@section('content')
<div class="container">
<div class="text-center mb-3">
<h3>Oldest movies:</h3>
<a href="{{route('apimovies')}}" class="btn btn-primary">API Movies link</a>

</div>
<table class="table">
  <thead>
    <tr>
    <th scope="col">ID</th>  
      <th scope="col">Title</th>
      <th scope="col">Date of publishing</th>
      <th scope="col">Created At</th>
      <th scope="col">Grade</th>
      <th scope="col">Length</th>
      <th scope="col">Category</th>
      <th scope="col">Director</th>
      <th scope="col">Details</th>
      <th scope="col">API</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($movies as $movie)
    <tr>
      <th scope="row">{{$movie->id}}</th>
      <td>{{$movie->title}}</td>
      <td>{{$movie->date_of_publishing}}</td>
      <td>{{$movie->created_at}}</td>
      <td>{{$movie->grade}}</td>
      <td>{{$movie->movie_length}}</td>
      <td>{{$movie->category->name}}</td>
      <td>{{$movie->director->name}}</td>
      <td><a href="{{route('movie.detail', $movie->id)}}"><button class="btn btn-primary">Details</button></a></td>
      <td><a href="{{route('apimovie', $movie->id)}}"><button class="btn btn-primary">API link</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection