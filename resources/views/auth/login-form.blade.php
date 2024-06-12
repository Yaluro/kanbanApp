<div class="card w-50 shadow-sm p-4">
    <h2 class="mb-4">Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group mb-3">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-check mb-3 d-flex align-items-center">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary w-100 text-light">
                {{ __('Login') }}
            </button>

            <div class="mt-3">
                <a href="{{ route('register') }}" class="btn btn-primary w-100 text-light">
                    {{ __('Register') }}
                </a>
            </div>

            @if (Route::has('password.request'))
            <a class="btn btn-link d-block mt-2" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>
    </form>
</div>
