@extends('layouts.master')

@section('content')
    <h1>Edit Order</h1>

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" style="">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="{{ $order->amount }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Order</button>
    </form>
@endsection
