{{-- @include('userside.userside_source.userside_partials.nav') --}}
@include('userside.userside_source.userside_partials.header')
<style>
    body {
        background: linear-gradient(135deg, #dbdbdb, #846deb);
        color: #fff;
        font-family: 'Poppins', sans-serif;
        height: 100vh;
        margin: 0;
    }

    .card {
        margin-top: 50px;
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
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px; border-radius: 10px;">
        <div class="card-body">
            <h3 class="text-center mb-4">{{ __('Register') }}</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="First_name" class="form-label">{{ __('First Name') }}</label>
                    <input id="First_name" type="text" class="form-control @error('First_name') is-invalid @enderror"
                        name="First_name" value="{{ old('First_name') }}" required autofocus>
                    @error('First_name')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="Last_name" class="form-label">{{ __('Last Name') }}</label>
                    <input id="Last_name" type="text" class="form-control @error('Last_name') is-invalid @enderror"
                        name="Last_name" value="{{ old('Last_name') }}" required>
                    @error('Last_name')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
                    <input id="phone_number" type="tel"
                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                        value="{{ old('phone_number') }}" required>
                    @error('phone_number')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required>
                    @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
