@extends("layouts.main")

@section("container")
    <h1>{{ $post->title }}</h1>
    <h6>{{ $post->author }}</h6>
    <p>{!! $post->body !!}</p>

    <a class="text-decoration-none" href="/blog">Kembali</a>
@endsection