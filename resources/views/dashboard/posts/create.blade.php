@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-lg-8">
            
            <form method="POST" action="/dashboard/posts" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="title">Add Post</label>
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
                <img class="img-preview img-fluid col-5 my-3">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">Input Image</label>
                    <input class="form-control" name="image" type="file" id="image" onchange="previewImage()">
                  </div>
                  
                </div>
                <div class="form-group">
                  <input id="body" type="hidden" name="body">
                  <trix-editor class="@error('body') is-invalid @enderror" input="body" value={{ old('body') }} style="max-height: 200px; overflow-y:scroll;"></trix-editor>
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

      document.querySelector('.custom-file-input').addEventListener("change", function(e) {
        var fileInput = e.eventTarget;
        var fileName = fileInput.files[0].name;
        console.log('File Name:', fileName); // Debugging
        var label = fileInput.nextElementSibling;
        label.textContent = fileName;
      });

      function previewImage() {
        const imgInput = document.querySelector("#image");
        const imgPreview = document.querySelector(".img-preview");

        imgPreview.style.display = "block";

        const oFReader = new FileReader();

        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
          imgPreview.src = oFREvent.target.result
        }
      }
    </script>
@endsection