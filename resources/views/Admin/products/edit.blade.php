@extends('layouts.master')

@section('title', 'Edit Product')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Edit Product</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.update-product', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}"
                            required>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" name="price" class="form-control"
                            value="{{ old('price', $product->price) }}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">description</label>
                        <input type="text" name="description" class="form-control"
                            value="{{ old('description', $product->description) }}">
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="New" {{ $product->status === 'New' ? 'selected' : '' }}>New</option>
                            <option value="used" {{ $product->status === 'used' ? 'selected' : '' }}>Used</option>
                            <option value="Used in new condition"
                                {{ $product->status === 'Used in new condition' ? 'selected' : '' }}>Used in new condition
                            </option>
                        </select>
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $product->category_id === $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
