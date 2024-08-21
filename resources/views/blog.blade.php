
@extends('layouts.main')

@section('container')
    <h1 class="mb-5 ">{{ $title }}</h1>

    <div class="row my-5 justify-content-center">
        <div class="col-md-8">
            <form action="/blog">
                <div class="input-group mb-3">
                    <input type="text" class="form-control mr-3" placeholder="Search Post" aria-label="Search Post" aria-describedby="basic-addon2" name="search">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($posts->count())
        <div class="card mb-5 text-center">
          <img class="card-img-top" src={{ asset('storage/'.$posts[0]->image) }} alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">
                <a class="text-decoration-none text-black" href="/blog/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>
              </h5>
              <p>By {{ $posts[0]->user->name }} in {{ $posts[0]->category->category }} <small class="text">{{ $posts[0]->created_at->diffForHumans() }}</small></p>
              <p class="card-text">{!! $posts[0]->excerpt !!}</p>
              <p class="card-text"></p>

              <a class="btn btn-primary text-decoration-none mt-5" href="/blog/{{ $posts[0]->slug }}">Read More...</a>
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif

    

    <div class="row mt-5">
    @foreach ($posts->skip(1) as $post)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img class="card-img-top" src="/storage/{{$post->image}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">
                        <a class="text-decoration-none" href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                      </h5>
                      <p>By {{ $post->user->name }} in {{ $post->category->name }} <small class="text">{{ $post->created_at->diffForHumans() }}</small></p>
                      <p class="card-text">{{ $post->excerpt }}</p>
                      <a href="/blog/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                    </div>
                  </div>
            </div>
        @endforeach
    </div>

    {{ $posts->links() }}
@endsection