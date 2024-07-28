
@extends('layouts.main')

@section('container')
    <h1 class="mb-5 ">{{ $title }}</h1>

    @if($posts->count())
        <div class="card mb-3">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif

    

    @foreach ($posts as $post)
        <div class="py-5 border-bottom border-2">
            <h2>
                <a class="text-decoration-none" href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
            </h2>
            <p>By {{ $post->user->name }} in {{ $post->category->name }}</p>
            <p class="mb-4">{{ $post->excerpt }}</p>
            <a class="text-decoration-none mt-5" href="/blog/{{ $post->slug }}">Read More...</a>
        </div>
    @endforeach
@endsection