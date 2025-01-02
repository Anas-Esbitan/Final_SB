@extends('layouts.master')

@section('title', 'Users')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Users</h1>
        <a href="{{ route('admin.add-user') }}" class="btn btn-primary mb-3">Add New User</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th> 
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->First_name }}</td>
                        <td>{{ $user->Last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td> <!-- عرض رقم الهاتف -->
                        <td>{{ $user->address }}</td> <!-- عرض العنوان -->
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('admin.edit-user', $user->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.delete-user', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
