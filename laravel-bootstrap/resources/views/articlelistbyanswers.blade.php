@extends('layouts.app')
@section('content')
<div class="container">
<div class="text-center mb-3">
<a href="{{route('apiarticles')}}" class="btn btn-primary">API Articles link</a>
</div>
<table class="table">
  <thead>
    <tr>
    <th scope="col">ID</th>  
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Created At</th>
      <th scope="col">Views</th>
      <th scope="col">Answers</th>
      <th scope="col">Details</th>
      <th scope="col">API</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
      <th scope="row">{{$article->id}}</th>
      <td>{{ $article->title }}</td>
      <td>{{ $article->author }}</td>
      <td>{{$article->created_at}} ({{ Carbon\Carbon::parse($article->created_at)->diffForHumans()}}) </td>
      <td>{{$article->viewsCount}}</td>
      <td>{{$article->answersCount}}</td>
      <td><a href="{{route('article.id', $article->id)}}"><button class="btn btn-primary">Details</button></a></td>
      <td><a href="{{route('api.detail.article', $article->id)}}" class="btn btn-primary">API LINK</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection