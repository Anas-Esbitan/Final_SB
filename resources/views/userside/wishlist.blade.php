@extends('userside.userside_source.userside_template')

@section('content')
    <br><br>
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="font-size: 2.5rem; color: #333; font-weight: bold;">Your Wishlist</h1>
        <div class="row justify-content-center">
            @if ($wishlistItems->isEmpty())
                <!-- Empty State -->
                <div class="col-lg-6 text-center">
                    <p class="text-muted mb-4" style="font-size: 1.2rem;">The wish list is empty.</p>
                    <a href="{{ route('/') }}" class="btn btn-primary btn-lg" style="padding: 0.75rem 2rem;">
                        <i class="fas fa-shopping-cart me-2"></i> Go shopping
                    </a>
                </div>
            @else
                <!-- Wishlist Items -->
                <div class="col-lg-8">
                    @foreach ($wishlistItems as $item)
                        <!-- Compact Wishlist Item -->
                        <div class="card mb-4 shadow-sm hover-shadow" style="border-radius: 10px; overflow: hidden;">
                            <div class="row g-0">
                                <!-- Image Column -->
                                <div class="col-md-4">
                                    <div class="position-relative h-100">
                                        @if ($item->product->images->isNotEmpty())
                                            <img src="{{ asset('storage/' . $item->product->images->first()->path) }}"
                                                class="img-fluid rounded-start h-100" style="object-fit: cover;"
                                                alt="{{ $item->product->name }}">
                                        @endif
                                    </div>
                                </div>

                                <!-- Content Column -->
                                <div class="col-md-8">
                                    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
                                        rel="stylesheet">

                                    <div class="card-body position-relative">
                                        <!-- Remove Button -->
                                        <form action="{{ route('wishlist.remove', $item->id) }}" method="POST"
                                            class="position-absolute top-0 end-0 mt-2 me-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-light btn-sm rounded-circle"
                                                style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>

                                        <!-- Product Info -->
                                        <h5 class="card-title mb-2" style="font-size: 1.5rem; color: #333;">
                                            {{ $item->product->name }}
                                        </h5>
                                        <p class="card-text text-muted mb-2">
                                            <small>${{ number_format($item->product->price, 2) }}</small>
                                        </p>

                                        <!-- Description with show more/less -->
                                        <div class="description-container mb-3">
                                            <p class="card-text description-text mb-1"
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                {{ $item->product->description }}
                                            </p>
                                            @if (strlen($item->product->description) > 100)
                                                <button class="btn btn-link btn-sm p-0 text-muted show-more-btn"
                                                    onclick="toggleDescription(this)" style="text-decoration: none;">
                                                    Show more
                                                </button>
                                            @endif
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('product.details', $item->product->id) }}"
                                                class="btn btn-primary btn-sm"
                                                style="background-color: #007bff; border: none; padding: 0.5rem 1rem;">
                                                <i class="fas fa-eye"></i> View Details
                                            </a>
                                            {{-- <button class="btn btn-outline-primary btn-sm">
                                                Add to Cart
                                            </button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <style>
        /* Card Hover Effect */
        .hover-shadow {
            transition: box-shadow 0.3s ease-in-out;
        }

        .hover-shadow:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }

        /* Description Toggle */
        .description-text {
            transition: all 0.3s ease;
        }

        .description-text.expanded {
            display: block !important;
            -webkit-line-clamp: unset !important;
        }

        /* Button Styles */
        .btn-sm {
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
        }

        .btn-light {
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .btn-light:hover {
            background-color: rgba(255, 255, 255, 1);
            border-color: rgba(0, 0, 0, 0.2);
        }

        /* Card Layout */
        .card {
            border: none;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        /* Image Styles */
        .img-fluid {
            min-height: 200px;
            max-height: 200px;
            width: 100%;
        }

        @media (max-width: 768px) {
            .img-fluid {
                min-height: 150px;
                max-height: 150px;
            }
        }
    </style>

    <script>
        function toggleDescription(button) {
            const descriptionText = button.previousElementSibling;
            descriptionText.classList.toggle('expanded');
            button.textContent = descriptionText.classList.contains('expanded') ? 'Show less' : 'Show more';
        }
    </script>
@endsection
