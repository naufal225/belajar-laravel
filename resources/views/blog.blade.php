
@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Blog Saya</h1>
    @foreach ($posts as $post)
        <h2>
            <a href="blog/{{ $post['slug'] }}">{{ $post['judul'] }}</a>
        </h2>
        <p>{{ $post['author'] }}</p>
        <p class="mb-4">{{ $post['isi'] }}</p>
    @endforeach
@endsection