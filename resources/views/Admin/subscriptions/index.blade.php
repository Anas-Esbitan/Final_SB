@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Subscriptions</h1>
    <a href="{{ route('subscriptions.create') }}" class="btn btn-primary mb-3">Add Subscription</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Type</th>
                <th>Price</th>
                <th>Status</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriptions as $subscription)
                <tr>
                    <td>{{ $subscription->id }}</td>
                    <td>{{ $subscription->user->First_name }}</td>
                    <td>{{ $subscription->subscription_type }}</td>
                    <td>{{ $subscription->price }}</td>
                    <td>{{ $subscription->status }}</td>
                    <td>{{ $subscription->start_date }}</td>
                    <td>{{ $subscription->end_date }}</td>
                    <td>
                        <a href="{{ route('subscriptions.edit', $subscription->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('subscriptions.destroy', $subscription->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
