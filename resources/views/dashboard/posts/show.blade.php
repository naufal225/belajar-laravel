@extends('dashboard.layouts.main')

@section('container')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">

            <h1>{{ $post->title }}</h1>

            <img src="/storage/{{ $post->image }}" style="width: 600px;" class="my-3" alt=""> <br>
            <a href="/dashboard" class="btn btn-success my-3">Back To Dashboard</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning text-white"><span data-feather="edit"></span></a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
              @method("delete")
              @csrf
              <button class="badge bg-danger text-white border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-circle"></button>
            </form>
            <p>{!! $post->body !!}</p>
        </div>
    </div>
@endsection