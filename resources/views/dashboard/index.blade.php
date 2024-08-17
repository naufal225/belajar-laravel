@extends('dashboard.layouts.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Welcome Back, {{ Auth::user()->name }}</h1>
    </div>
    @can("admin")
    <div class="table-responsive small">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td><img src="/storage/{{ $post->image }}" style="width: 50px;" alt=""></td>
                <td>{{ $post->user()->name }}</td>
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
    @endcan
@endsection