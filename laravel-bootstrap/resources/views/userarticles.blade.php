@extends('layouts.app')
@section('content')
<h1>Articles written by user {{$user->name}}:</h1>
            @foreach($user->articles as $article)
            <p><strong>Title:</strong>{{ $article->title }}</p>
    <p><strong>Author: </strong>{{ $article->author }}</p>
    <p><strong>Lead:</strong> {{$article->lead}}</p>
    <p><strong>Content:</strong>{{ $article->content }}</p>
    <p><strong>Views: </strong> {{$article->viewsCount}}</p>
            @endforeach
@endsection