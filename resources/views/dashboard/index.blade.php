@extends('dashboard.layouts.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Welcome Back, Naufal Ma'ruf</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                <svg class="bi"><use xlink:href="#calendar3"/></svg>
                This week
              </button>
            </div>
          </div>

          <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Add Post</a>

          @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <div class="table-responsive small">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Category</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->category->name }}</td>
                      <td>
                        <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span class="text-white" data-feather="eye"></span></a>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning text-white"><span data-feather="edit"></span></a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                          @method("delete")
                          @csrf
                          <button class="badge bg-danger text-white border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-circle"></button>
                        </form>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
@endsection