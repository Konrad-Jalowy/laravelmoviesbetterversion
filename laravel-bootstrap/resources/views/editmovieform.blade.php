@extends('layouts.app')
@section('content')
<form method="POST" action="{{ route('movie.editStore', $movie->id) }}">
        @csrf
        <p>Title</p>
        <input type="text" name="title" id="title" value="{{$movie->title}}">
        <br>
        <p>Category</p>
        <select name="category" id="category">
            @foreach ($categories as $category)
            @if ($category->id === $movie->category_id)
            <option value="{{$category->id}}" selected>{{$category->name}}</option>
            @else
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endif
            @endforeach
        </select>
        <br>
        <p>Grade:</p>
        <select name="grade" id="grade">
            @for ($i = 1; $i < 11; $i++)
            @if ($i === $movie->grade)
            <option value="{{ $i }}" selected>{{ $i }}</option>
            @else
            <option value="{{ $i }}">{{ $i }}</option>
            @endif
            @endfor
        </select>
        <br>
        <p>Director</p>
        <select name="director" id="director">
            @foreach ($directors as $director)
            @if ($director->id === $movie->director_id)
            <option value="{{$director->id}}" selected>{{$director->name}}</option>
            @else
            <option value="{{$director->id}}">{{$director->name}}</option>
            @endif
            @endforeach
        </select>
        <br>
        <p>Date of publishing</p>
        <br>
        <input type="date" name="date_of_publishing" id="date_of_publishing" value="{{$movie->date_of_publishing}}">
        <br>
        <p>Movie length</p>
        <br>
        <input type="number" name="movie_length" id="movie_length" value="{{$movie->movie_length}}">
        <br>
        <p>Review:</p>
        <textarea name="review" id="review" cols="30" rows="10">{{$movie->review}}</textarea>
        <br>
        
        <input type="submit" value="Submit">
    </form>
@endsection