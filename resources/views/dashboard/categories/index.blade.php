@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Categories</h2>
        
    </div>

    

    <div class="col-lg-8">

      <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Add Category</a>

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
                  <th scope="col">Category</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $category->name }}</td>
                      <td>
                        <a href="/dashboard/posts/{{ $category->slug }}" class="badge bg-info"><span class="text-white" data-feather="eye"></span></a>
                        <a href="/dashboard/posts/{{ $category->slug }}/edit" class="badge bg-warning text-white"><span data-feather="edit"></span></a>
                        <form action="/dashboard/posts/{{ $category->slug }}" method="post" class="d-inline">
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