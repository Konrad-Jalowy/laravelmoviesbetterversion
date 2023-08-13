@extends('layouts.app')
@section('content')
@if(session('message'))
<div class="container mx-auto">
<div class="alert alert-success position-relative text-center w-50 mx-auto" role="alert">
{{ session('message') }}
<button  @click="alert()" class="btn btn-danger position-absolute top-0 end-0 h-100">Close</button>
</div>
</div>
@else
@endif
<div class="text-center mb-3">
<a href="{{route('api.detail.article', $article->id)}}" class="btn btn-primary">API LINK</a>
</div>
    <div class="card text-center">
            <div class="card-header">
            Author: {{ $article->author }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text"><strong>{{$article->lead}}</strong></p>
                <p class="card-text">{!!  $article->content  !!}</p>
                <p class="card-text"><small>Published: {{$article->created_at->diffForHumans()}}</small></p>
                <a href="{{route('article.edit-form', $article->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('article.comment', $article->id)}}" class="btn btn-primary">Add comment</a>
            </div>
            <div class="card-footer text-body-secondary">
                Views: {{$article->viewsCount}} Answers: {{$article->answersCount}}
            </div>
            </div>
    @if($article->answersCount == 0)

    @else
    <div class="card-group">
    @foreach ($article->answers as $answer)
                @yourAnswer($answer)
                <x-answer author="You" content="{{$answer->content}}" id1="{{$article->id}}" id2="{{$answer->id}}"></x-answer>
                @else
                <x-answer author="{{$answer->author}}" content="{{$answer->content}}" id1="{{$article->id}}" id2="{{$answer->id}}" ></x-answer>
                @endyourAnswer 
        @endforeach
    </div>
    
    @endif
       
@endsection

