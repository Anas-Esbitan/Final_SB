@extends('userside.userside_source.userside_template')

@section('title', 'Add Product')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Add Product</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="New" {{ old('status') == 'New' ? 'selected' : '' }}>New</option>
                            <option value="used" {{ old('status') == 'used' ? 'selected' : '' }}>Used</option>
                            <option value="Used in new condition"
                                {{ old('status') == 'Used in new condition' ? 'selected' : '' }}>Used in new condition
                            </option>
                        </select>
                    </div>


                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" class="form-control" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Image -->
                    <div class="form-group">
                        <label for="images">Upload Images</label>
                        <input type="file" name="images[]" multiple class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>

            </div>
        </div>
    </div>
@endsection
