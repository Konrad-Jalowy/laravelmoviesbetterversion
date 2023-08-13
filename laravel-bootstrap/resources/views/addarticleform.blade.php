@extends('layouts.app')
@section('content')
    @include('layouts.partials.addarticleform')
@endsection

@push('js_after')
@vite(['resources/js/bbcodes.js'])
@endpush