@extends('layouts.app')
@section('content')
    <div class="container">
    <form action="{{ route('article.storeComment', $article->id) }}" method="POST">
            @csrf
            <label for="content" class="form-label">Your Comment:</label>
            <br>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
<input type="submit" value="Submit" class="btn btn-primary">
</form>
    </div>
@endsection