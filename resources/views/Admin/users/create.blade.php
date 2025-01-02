@extends('layouts.master')

@section('title', 'Add New User')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Add New User</h1>
        <form action="{{ route('admin.store-user') }}" method="POST">
            @csrf

            <!-- First name -->
            <div class="mb-3">
                <label for="First_name" class="form-label">First name</label>
                <input type="text" class="form-control" name="First_name" value="{{ old('First_name') }}" required>
                @error('First_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Last name -->
            <div class="mb-3">
                <label for="Last_name" class="form-label">Last name</label>
                <input type="text" class="form-control" name="Last_name" value="{{ old('Last_name') }}" required>
                @error('Last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>

            <!-- Phone Number -->
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number (Optional)</label>
                <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
                @error('phone_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Role -->
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label for="address" class="form-label">Address (Optional)</label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
            </div>

            <!-- Submit Button -->
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create User</button>
            </div>
        </form>
    </div>
@endsection
