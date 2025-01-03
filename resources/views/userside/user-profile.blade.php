@extends('userside.userside_source.userside_template')

<style>
    body {

        background-color: #f7f9fc;
        font-family: 'Poppins', sans-serif;
    }

    .card-header {
        background: linear-gradient(135deg, #6c63ff, #3f2b96);
        color: #fff;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    .card {
        margin-top: 90px;
        background-color: #fff;
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .table th {
        font-weight: 600;
        color: #3f2b96;
        font-size: 16px;
    }

    .table td {
        color: #333;
        font-size: 16px;
    }

    .btn-primary {
        background-color: #6c63ff;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #3f2b96;
    }
</style>

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- User Profile Section -->
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <div class="card-header text-center">
                        <h3>User Profile</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th style="width: 40%;">First Name:</th>
                                <td>{{ $user->First_name }}</td>
                            </tr>
                            <tr>
                                <th>Last Name:</th>
                                <td>{{ $user->Last_name }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number:</th>
                                <td>{{ $user->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>{{ $user->address }}</td>
                            </tr>
                        </table>
                        <div class="text-center mt-4">
                            <a href="{{ route('user.profile.edit') }}" class="btn btn-primary btn-lg"
                                style="width: 100%;">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Products Section -->

            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <div class="card-header text-center">
                        <h3>User Products</h3>
                    </div>
                    <div class="card-body">
                        @if ($user->products->isEmpty())
                            <p class="text-center mt-3">No products found for this user.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        {{-- <th>Description</th> --}}
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->products as $index => $product)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $product->name }}</td>
                                            {{-- <td>{{ $product->description }}</td> --}}
                                            <td>${{ $product->price }}</td>
                                            <td>
                                                <!-- Delete Button Form -->
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        style="border: none; background: none; cursor: pointer;">
                                                        <i class="fa-solid fa-trash"
                                                            style="color: rgb(93, 68, 68); font-size: 1.2rem;"></i>
                                                    </button>

                                                    <link rel="stylesheet"
                                                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
