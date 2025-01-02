@extends('userside.userside_source.userside_template')
<br><br>
@section('content')
<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px; border-radius: 15px;">
        <div class="card-header bg-primary text-white text-center" style="border-radius: 15px 15px 0 0;">
            <h3>Edit Profile</h3>
        </div>
        <div class="card-body">
            <!-- عرض الرسائل إذا كانت موجودة -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- نموذج تعديل الملف الشخصي -->
            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                @method('PUT') <!-- تحديد أنه POST لكن نوعه UPDATE -->
                
                <div class="form-group mb-3">
                    <label for="First_name" class="form-label">First Name</label>
                    <input type="text" name="First_name" id="First_name" class="form-control" value="{{ old('First_name', $user->First_name) }}" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="Last_name" class="form-label">Last Name</label>
                    <input type="text" name="Last_name" id="Last_name" class="form-control" value="{{ old('Last_name', $user->Last_name) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number', $user->phone_number) }}">
                </div>

                <div class="form-group mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $user->address) }}">
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label">New Password (Optional)</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password (Optional)</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
