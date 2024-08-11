@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-lg-8">
            
            <form method="POST" action="/dashboard/posts">
              @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="" value={{ old('title') }}>
                  @error('title')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="" name="slug" value={{ old('slug') }}>
                  @error('slug')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="category">Category</label>
                  <select class="custom-select @error('category_id') is-invalid @enderror" id="category" name="category_id" value={{ old('category_id') }}>
                    @foreach ($categories as $category)
                      @if(old('category_id') === $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                      @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endif
                    @endforeach
                  </select>
                  @error('category_id')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <input id="body" type="hidden" name="body">
                  <trix-editor class="@error('body') is-invalid @enderror" input="body" value={{ old('body') }}></trix-editor>
                  @error('body')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
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

      document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
      });
    </script>
@endsection