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

    <h3>Actor detail view</h3>
    </div>
  <tbody>
    <tr>
      <td><strong>Name:</strong></td>
      <td>{{ $actor->name }}</td>
    </tr>
    <tr>
    <td><strong>Date of birth:</strong></td>
    <td>{{ $actor->date_of_birth }}</td>
    </tr>
  </tbody>
</table>

<div class="card mx-auto" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Bio:</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Biography of an actor:</h6>
    <p class="card-text">{{$actor->bio}}</p>
    <div class="text-center">
    <a href="{{route('actor.edit', $actor->id)}}" class="card-link ">Edit</a>
    <a href="{{route('apiactor', $actor->id)}}" class="card-link">API Link</a>
    </div>
    
  </div>

</div>

</div>
@endsection
