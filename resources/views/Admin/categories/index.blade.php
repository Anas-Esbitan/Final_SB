@extends('layouts.master')

@section('title', 'categories')
@section('content')

    <div class="container-fluid px-4">

        <div class="card mt-4">
            <div class="card-headar">
                <h4>View categories <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">Add
                        categories</a></h4>

            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->image)
                                        <img src="{{ asset($category->image) }}" alt="Category Image" width="50">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/edit-category/' . $category->id) }}"
                                        class="btn btn-success btn-sm">Edit</a>


                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination justify-content-center">
                    {{ $categories->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
