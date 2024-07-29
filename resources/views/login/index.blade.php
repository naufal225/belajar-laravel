@extends('layouts.main')

@section('container')

    

    <div class="row justify-content-center">
        <div class="col-md-4">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center text-bold">Login</h1>
                <form>
                    @csrf
                  <div class="form-floating">
                    <input type="email" class="form-control rounded-top" id="floatingInput" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                  </div>
                  <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                </form>
                <small class="d-block text-center mt-4">Not Registed? <a href="/register" class="text-decoration-none">Register Now!</a></small>
              </main>
        </div>
    </div>
  
@endsection