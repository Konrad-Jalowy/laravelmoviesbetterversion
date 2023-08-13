@extends('layouts.app')
@section('content')
<div class="container">

<form method="POST" action="{{ route('article.editStore', $article->id) }}">
        @csrf
        <label for="title" class="form-label">Title:</label>
        <input type="text" name="title" id="title" class="form-control" value="{{$article->title}}">
        <label for="lead" class="form-label">Lead:</label>
        <textarea name="lead" id="lead" class="form-control" cols="30" rows="10">{{$article->lead}}</textarea>
        <label for="content" class="form-label">Content:</label>
        <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{$article->content}}</textarea>
        <input type="submit" value="Submit" class="btn btn-primary">
</form>

</div>
@endsection