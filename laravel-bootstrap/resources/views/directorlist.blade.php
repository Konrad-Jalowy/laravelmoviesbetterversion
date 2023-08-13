@extends('layouts.app')
@section('content')
<div class="container">
<div class="text-center mb-3">
<a href="{{route('apidirectors')}}" class="btn btn-primary">API Directors link</a>
</div>
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
    @foreach($directors as $director)
    <tr>
      <th scope="row">{{$director->id}}</th>
      <td>{{$director->name}}</td>
      <td>{{$director->date_of_birth}}</td>
      <td>{{$director->created_at}}</td>
      <td><a href="{{route('director.detail', $director->id)}}"><button class="btn btn-primary">Details</button></a></td>
      <td><a href="{{route('apidirector', $director->id)}}"><button class="btn btn-primary">API link</button></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection