@extends('layouts.app')
@section('content')
@if(session('message'))
<div class="alert alert-success" role="alert">
{{ session('message') }}
</div>
@else
@endif
<div class="container">
<div class="text-center mb-3">
<a href="{{route('apiactors')}}" class="btn btn-primary">API Actors link</a>
</div>
<table class="table caption-top">
    <div class="text-center">

    <h3>Director detail view</h3>
    </div>
  <tbody>
    <tr>
      <td><strong>Name:</strong></td>
      <td>{{ $director->name }}</td>
    </tr>
    <tr>
    <td><strong>Date of birth:</strong></td>
    <td>{{ $director->date_of_birth }}</td>
    </tr>
    <td><strong>Number of movies:</strong></td>
    <td>{{ $director->movies_count }}</td>
    </tr>
  </tbody>
</table>
<table class="table">
<div class="text-center">

<h5>Director Movies</h5>
</div>
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
  @foreach ($director->movies as $movie)
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
<div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Bio:</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Biography of an director:</h6>
    <p class="card-text">{{$director->bio}}</p>
    <div class="text-center">
    <a href="#" class="card-link ">Edit</a>
    <a href="#" class="card-link">API Link</a>
    </div>
    
  </div>

</div>

</div>
@endsection
