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
                  <div class="form-group border p-2">
                    <label for="">Gender</label> <br>
                    <input class="d-inline ml-4" type="radio" class="form-control @error('gender') is-invalid  @enderror" id="jeniskl" name="gender" value="male" {{ old("gender") == 'male' ? "checked" : "" }}><label for="jeniskl" required>Male</label>
                    <input class="d-inline ml-5" type="radio" class="form-control @error('gender') is-invalid  @enderror" id="jeniskp" name="gender" value="female" {{ old("member") == "female" ? "checked" : "" }}><label for="jeniskp" required>Female</label>
                  </div>
                  @error('gender')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  <div class="form-group border p-2">
                    <label>Hobby</label> <br>
                    <input type="checkbox" name="hobby[]" id="bacaBuku" value="Reading Book" {{ is_array(old("hobby")) && in_array("Reading Book", old("hobby")) }}><label for="bacaBuku">Reading Book</label><br>
                    <input type="checkbox" name="hobby[]"  id="ngoding" value="Coding" {{ is_array(old("hobby")) && in_array("Coding", old("hobby")) }}><label for="ngoding">Coding</label><br>
                    <input type="checkbox" name="hobby[]"  id="lainnya" value="Others" {{ is_array(old("hobby")) && in_array("Others", old("hobby")) }}><label for="lainnya">Others</label><br>
                    <span class="errorHobi" id="errorHobi">Please select at least one hobby</span>
                  </div>
                  @error('hobby')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  <div class="form-group p-2 border">
                    <label for="telepon">Your Number</label>
                    <input type="number" class="form-control" id="telepon" name="telp" placeholder="Your Phone Number" required>
                  </div>
                  @error('telp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  <div class="form-group p-2 border">
                    <label for="kota">Your City</label>
                    <select name="city" id="kota" required>
                      <option value="bekasi" {{ old('city') == 'bekasi' ? 'selected' : '' }}>Bekasi</option>
                      <option value="jakarta" {{ old('city') == 'jakarta' ? 'selected' : '' }}>Jakarta</option>
                      <option value="bandung" {{ old('city') == 'bandung' ? 'selected' : '' }}>Bandung</option>
                      <option value="depok" {{ old('city') == 'depok' ? 'selected' : '' }}>Depok</option>
                      <option value="sukabumi" {{ old('city') == 'sukabumi' ? 'selected' : '' }}>Sukabumi</option>
                      <option value="semarang" {{ old('city') == 'semarang' ? 'selected' : '' }}>Semarang</option>
                      <option value="cirebon" {{ old('city') == 'cirebon' ? 'selected' : '' }}>Cirebon</option>
                      <option value="klaten" {{ old('city') == 'klaten' ? 'selected' : '' }}>Klaten</option>
                      <option value="cianjur" {{ old('city') == 'cianjur' ? 'selected' : '' }}>Cianjur</option>
                      <option value="cikarang" {{ old('city') == 'cikarang' ? 'selected' : '' }}>Cikarang</option>
                      <option value="karawang" {{ old('city') == 'karawang' ? 'selected' : '' }}>Karawang</option>
                      <option value="garut" {{ old('city') == 'garut' ? 'selected' : '' }}>Garut</option>
                    </select>
                  </div>
                  @error('city')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                  <div class="form-group p-2 border">
                    <label for="alasan">Your Reason</label>
                    <textarea name="reason" id="alasan" required value="{{ old("reason") }}"></textarea>
                  </div>
                  @error('reason')
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