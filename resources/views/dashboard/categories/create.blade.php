@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Add Category</h2>
        
    </div>
    <form action="post" action="dashboard/categories">
        @method("post")
        @csrf
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" placeholder="" value={{ old('category') }}>
            @error('category')
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
    </form>
@endsection