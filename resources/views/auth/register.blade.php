{{-- @include('userside.userside_source.userside_partials.nav') --}}
@include('userside.userside_source.userside_partials.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    body {
        background: linear-gradient(-45deg, #6c63ff, #ff6b6b, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        height: 120vh;
        margin: 0;
    }

    @keyframes gradientBG {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .card {
        margin-top: 50px;
        background: #fff;
        color: #333;
        border: none;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
    }

    .form-control {
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:hover {
        border-color: #6c63ff;
    }

    .form-control:focus {
        border-color: #6c63ff;
        box-shadow: 0 0 5px rgba(108, 99, 255, 0.5);
    }

    .btn-primary {
        background-color: #6c63ff;
        border: none;
        transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #3f2b96;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .btn-primary:active {
        transform: translateY(0);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
        .card {
            margin-top: 20px;
            width: 90%;
        }

        body {
            padding: 20px;
        }
    }
</style>
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px;">
        <div class="card-body">
            <h3 class="text-center mb-4">{{ __('Register') }}</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="First_name" class="form-label">{{ __('First Name') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input id="First_name" type="text"
                            class="form-control @error('First_name') is-invalid @enderror" name="First_name"
                            value="{{ old('First_name') }}" required autofocus>
                    </div>
                    @error('First_name')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="Last_name" class="form-label">{{ __('Last Name') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input id="Last_name" type="text"
                            class="form-control @error('Last_name') is-invalid @enderror" name="Last_name"
                            value="{{ old('Last_name') }}" required>
                    </div>
                    @error('Last_name')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input id="phone_number" type="tel"
                            class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                            value="{{ old('phone_number') }}" required>
                    </div>
                    @error('phone_number')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <p>Already have an account? <a href="{{ route('login') }}" class="text-primary">Login here</a></p>
            </div>
        </div>
    </div>
</div>
