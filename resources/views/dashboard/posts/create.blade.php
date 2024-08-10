@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-lg-8">
            
            <form method="POST" action="/dashboard/posts">
              @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="">
                </div>
                <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control" id="slug" placeholder="" disabled readonly>
                </div>
                <div class="form-group">
                  <label for="category">Slug</label>
                  <select class="custom-select" id="category" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Post</button>
              </form>
        </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
          const title = document.querySelector("#title");
          const slug = document.querySelector("#slug");
          const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

          title.addEventListener('change', function () {
              fetch('/dashboard/posts/checkslug?title=' + title.value, {
                  headers: {
                      'X-CSRF-TOKEN': csrfToken
                  }
              })
              .then(response => response.json())
              .then(data => {
                  slug.value = data.slug;
              })
              .catch(error => console.error('Error:', error));
          });
      });
    </script>
@endsection