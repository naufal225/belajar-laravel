@extends("layouts.main")

@section("container")
    <h1>{{ $post->title }}</h1>
    <h5><a class="text-decoration-none" href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
    <h6><a class="text-decoration-none" href="/author/{{ $post->user->name }}">{{ $post->user->name }}</a></h6>
    <p>{!! $post->body !!}</p>

    <a class="text-decoration-none" href="/blog">Kembali</a>
@endsection