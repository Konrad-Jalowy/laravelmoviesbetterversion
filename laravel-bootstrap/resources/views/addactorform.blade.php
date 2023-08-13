@extends('layouts.app')
@section('content')
<div class="container">
<form method="POST" action="{{ route('actor.store') }}">
        @csrf
        <label for="name" class="label-form">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
        @error('name')
        <div class="alert alert-danger mt-2" role="alert">
        {{$message}}
        </div>
        @enderror
        <label for="date_of_birth">Date of birth:</label>
        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{old('date_of_birth')}}">
        @error('date_of_birth')
        <div class="alert alert-danger mt-2" role="alert">
        {{$message}}
        </div>
        @enderror
        <label for="bio" class="form-label">Bio:</label>
        <textarea name="bio" id="bio" cols="30" rows="10" class="form-control">{{old('bio')}}</textarea>
        @error('bio')
        <div class="alert alert-danger mt-2" role="alert">
        {{$message}}
        </div>
        @enderror
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
@endsection