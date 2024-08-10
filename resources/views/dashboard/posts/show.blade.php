@extends('dashboard.layouts.main')

@section('container')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">

            <h1>{{ $post->title }}</h1>

            <a href="/dashboard" class="btn btn-success my-3">Back To Dashboard</a>

            <h5><a class="text-decoration-none" href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
            <p>{!! $post->body !!}</p>
        </div>
    </div>
@endsection