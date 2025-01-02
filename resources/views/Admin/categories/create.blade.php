@extends('layouts.master')

@section('title','categories')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
<div class="card-header">
    <h4 class="">Add Categories</h4>
</div>
<div class="card-body">
    <form action="{{ url('admin/add-category') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div class="mb-3">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter category name" required>
        </div>
    
        <div class="mb-3">
            <label for="image">Category Image</label>
            <input type="file" name="image" class="form-control">
        </div>
    
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
    
</div>
    </div>

    </div>
    @endsection