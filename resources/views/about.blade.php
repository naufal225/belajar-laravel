@extends('layouts.main')

@section('container')
    <h1>About Me</h1>
    <h4 class="mt-3">{{ $name }}</h4>
    <h5>{{ $email }}</h5>
    <img src="img/{{ $profil }}" alt="" class="mt-4 img-thumbnail rounded-circle" width="300px">
@endsection