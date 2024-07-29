@extends("layouts.main")

@section("container")
    <div class="row justify-content-center">
        <div class="col-md-4">
            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center text-bold">Register</h1>
                <form method="post" action="/register">
                    @csrf
                  <div class="form-floating">
                      <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" required value="{{ old('name') }}">
                      <label for="name">Name</label>
                  </div>
                  @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                  <div class="form-floating">
                      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" required value="{{ old('username') }}">
                      <label for="username">Username</label>
                  </div>
                  @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                  <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                  </div>
                  @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                  <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required value="{{ old('password') }}">
                    <label for="password">Password</label>
                  </div>
                  @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                  <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                </form>
                <small class="d-block text-center mt-4">Have Registed? <a href="/login" class="text-decoration-none">Login Now!</a></small>
              </main>
        </div>
    </div>
@endsection