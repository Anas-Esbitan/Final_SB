@extends('layouts.master')

@section('title', 'Products Management')

@section('content')

    <div class="container-fluid px-4">
        <!-- العنوان وزر إضافة منتج -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>Manage Products</h4>
            <a href="{{ route('admin.create-product') }}" class="btn btn-primary">Add Product</a>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5>Products</h5>
            </div>
            <div class="card-body">
                <table id="products-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>User name</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>description</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->user->First_name }}</td>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>

                                <td>{{ $product->price }}.JOD</td>
                                <td>{{ ucfirst($product->status) }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <a href="{{ route('admin.edit-product', $product->id) }}"
                                        class="btn btn-success btn-sm">Edit</a>
                                    <form action="{{ route('admin.delete-product', $product->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $('#products-table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });
        });
    </script>
@endsection
