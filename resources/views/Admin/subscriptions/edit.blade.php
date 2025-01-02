@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Subscription</h1>
    <form action="{{ route('subscriptions.update', $subscription->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Subscription Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $subscription->name }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $subscription->price }}" required>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration (in days)</label>
            <input type="number" class="form-control" id="duration" name="duration" value="{{ $subscription->duration }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Subscription</button>
    </form>
</div>
@endsection
