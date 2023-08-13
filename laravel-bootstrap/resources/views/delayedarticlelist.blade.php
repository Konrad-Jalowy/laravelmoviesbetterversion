@extends('layouts.app')
@section('content')
<div class="container">
<table class="table">
  <thead>
    <tr>
    <th scope="col">ID</th>  
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Created At</th>
      <th scope="col">Will be published in</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
      <th scope="row">{{$article->id}}</th>
      <td>{{ $article->title }}</td>
      <td>{{ $article->author }}</td>
      <td>{{$article->created_at}} ({{ Carbon\Carbon::parse($article->created_at)->diffForHumans()}}) </td>
      <td>{{$article->publish_date}} ({{ Carbon\Carbon::parse($article->publish_date)->diffForHumans()}})</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection