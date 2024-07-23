@extends("layouts.main")

@section("container")
    <h1>{{ $post['judul'] }}</h1>
    <h6>{{ $post['author'] }}</h6>
    <p>{{ $post['isi'] }}</p>

    <a href="/blog">Kembali</a>
@endsection