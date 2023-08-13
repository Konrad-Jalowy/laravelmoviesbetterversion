@extends('layouts.app')
@section('content')
<div class="text-center">
    <h3>Add category:</h3>
</div>
<div class="container">
<form action="{{ route('category.store') }}" method="POST">
            @csrf
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control">
                <br>
                <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
    
@endsection