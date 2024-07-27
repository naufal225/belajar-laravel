@extends("layouts.main")

@section("container")
    <h1 class="mb-5">{{ $category->name }}</h1>

    @foreach($posts as $post)
        <div class="my-4">
            <h3><a class="text-decoration-none text-black" href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h3>
            <p>{{ $post['author'] }}</p>
            <p class="mb-4">{{ $post->excerpt }}</p>
        </div>
    @endforeach

@endsection