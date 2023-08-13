@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ route('answer.storeEdit', ['id' => $article->id, 'id2' => $answer->id]) }}" method="POST">
            @csrf
                <label for="content" class="form-label">Your comment:</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{$answer->content}}</textarea>
                <input type="submit" value="Submit" class="btn btn-primary">
</form>
</div>
@endsection