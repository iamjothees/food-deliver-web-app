<html>
    <head>
        @vite(['resources/sass/app.scss' ])
    </head>
    <body>
      @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif
        <div class="d-md-flex justify-content-md-center align-items-top align-items-md-center h-100">
            <form class="card p-5 w-50" method=post action="{{route('staff.authenticate')}}">
                <!-- Email input -->
                @csrf
                <div class="form-outline mb-4">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username') }}"/>
                </div>
            
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" />
                </div>
            
                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col mb-4">
                    <!-- Checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                      <label class="form-check-label text-nowrap" name="remember_me" for="form2Example31"> Remember me </label>
                    </div>
                  </div>
            
                  {{-- <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                  </div>
                </div> --}}
            
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
            
                {{-- <!-- Register buttons -->
                <div class="text-center">
                  <p>Not a member? <a href="#!">Register</a></p>
                  <p>or sign up with:</p>
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                  </button>
            
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                  </button>
            
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                  </button>
            
                  <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                  </button> --}}
                </div>
            </form>
        </div>
    </body>
</html>