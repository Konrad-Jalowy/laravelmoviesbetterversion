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
<a href="{{route('apimovies')}}" class="btn btn-primary">API Movies link</a>
</div>
<table class="table caption-top">
    <div class="text-center">

    <h3>Movie detail view</h3>
    </div>

    
  <tbody>
    <tr>
      <td><strong>Title:</strong></td>
      <td>{{ $movie->title }}</td>
    </tr>
    <tr>
    <td><strong>Category:</strong></td>
    <td>{{ $movie->category->name }}</td>
    </tr>
    <tr>
    <td><strong>Date of publishing: </strong></td>
    <td>{{ $movie->date_of_publishing }}</td>
    </tr>
    <tr>
    <td><strong>Director: </strong></td>
    <td>{{$movie->director->name}}</td>
    </tr>
    <tr>
    <td><strong>Movie length: </strong></td>
    <td>{{$movie->movie_length}}</td>
    </tr>
    <tr>
    <td><strong>Grade: </strong></td>
    <td>{{$movie->grade}}</td>
    </tr>
  </tbody>
</table>

<div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Review</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Our review of a movie:</h6>
    <p class="card-text">{{$movie->review}}</p>
    <div class="text-center">
    <a href="{{route('movie.edit', $movie->id)}}" class="card-link ">Edit</a>
    <a href="{{route('apimovie', $movie->id)}}" class="card-link">API Link</a>
    </div>
    
  </div>

</div>

</div>
@endsection