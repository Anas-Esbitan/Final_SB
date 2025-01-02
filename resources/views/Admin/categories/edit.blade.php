@extends('layouts.master')

@section('title','categories')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
<div class="card-header">
    <h4 class="">Edit Categories</h4>
</div>
<div class="card-body">
    <form action="{{ url('admin/update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="Enter category name" required>
        </div>
    
        <div class="mb-3">
            <label for="image">Category Image</label>
            <input type="file" name="image" class="form-control">
        </div>
    
        <button type="submit" class="btn btn-primary">update Category</button>
    </form>
    
</div>
    </div>

    </div>
    @endsection