@extends("layouts.main")

@section('container')
    <h1>By {{ $author }}</h1>
    @foreach($posts as $post)
        <div class="p-5 border-bottom border-2">
            <h2>
                <a class="text-decoration-none" href="blog/{{ $post->slug }}">{{ $post->title }}</a>
            </h2>
            <p>{{ $post['author'] }}</p>
            <p class="mb-4">{{ $post->excerpt }}</p>
            <a class="text-decoration-none mt-5" href="/blog/{{ $post->slug }}">Read More...</a>
        </div>
    @endforeach
@endsection