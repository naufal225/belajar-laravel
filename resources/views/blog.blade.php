
@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Blog Saya</h1>
    @foreach ($posts as $post)
        <h2>
            <a class="text-decoration-none text-black" href="blog/{{ $post->slug }}">{{ $post->title }}</a>
        </h2>
        <p>{{ $post['author'] }}</p>
        <p class="mb-4">{{ $post->excerpt }}</p>
    @endforeach
@endsection