{{-- @include('userside.userside_source.userside_partials.nav') --}}
@include('userside.userside_source.userside_partials.header')
<style>
    body {
        background: linear-gradient(135deg, #dbdbdb, #ad9fec);
        color: #fff;
        font-family: 'Poppins', sans-serif;
        height: 100vh;
        margin: 0;
    }

    .card {
        margin-top: 150px;
        background: #fff;
        color: #333;
        border: none;
    }

    .card h3 {
        font-weight: 600;
    }

    .card .btn-primary {
        background-color: #6c63ff;
        border: none;
        transition: background-color 0.3s ease;
    }

    .card .btn-primary:hover {
        background-color: #3f2b96;
    }
</style>
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px; border-radius: 10px;">
        <div class="card-body">
            <h3 class="text-center mb-4">{{ __('Login') }}</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-center mt-3">
                        <a href="{{ route('password.request') }}" class="text-decoration-none">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
