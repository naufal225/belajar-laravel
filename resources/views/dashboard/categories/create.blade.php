@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Add Category</h2>
    </div>
    <form action="{{ url('dashboard/categories') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="name" placeholder="" value="{{ old('category') }}">
            @error('category')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="" name="slug" value="{{ old('slug') }}">
            @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
        <button type="submit">Add Category</button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const category = document.querySelector("#category");
    const slug = document.querySelector("#slug");
    const csrfToken = document.querySelector("meta[name='csrf-token']").getAttribute("content");

    category.addEventListener("change", function() {
        fetch("/dashboard/categories/checkslug?category=" + category.value, {
            headers: {
                "X-CSRF-TOKEN": csrfToken
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.slug) {
                slug.value = data.slug;
            }
            
        })
        .catch(e => console.error("Error:", e));
    });
});

    </script>
@endsection
