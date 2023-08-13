@extends('layouts.app')
@section('content')
<div class="text-center mb-3">
<a href="{{route('apiactors')}}" class="btn btn-primary">API Actors link</a>
</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
    <th scope="col">ID</th>  
      <th scope="col">Name</th>
      <th scope="col">Date of birth</th>
      <th scope="col">Created At</th>
      <th scope="col">Details</th>
      <th scope="col">API</th>
    </tr>
  </thead>
  <tbody>
    @foreach($actors as $actor)
    <tr>
      <th scope="row">{{$actor->id}}</th>
      <td>{{$actor->name}}</td>
      <td>{{$actor->date_of_birth}}</td>
      <td>{{$actor->created_at}}</td>
      <td><a href="{{route('actor.detail', $actor->id)}}"><button class="btn btn-primary">Details</button></a></td>
      <td><a href="{{route('apiactor', $actor->id)}}"><button class="btn btn-primary">API link</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
