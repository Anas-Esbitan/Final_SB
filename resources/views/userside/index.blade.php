@extends('userside.userside_source.userside_template')

@section('content')
    <br><br><br><br>
    <!-- Slider Section -->
    <section class="section-slide" style="margin-top: 0px; ">
        <div class="wrap-slick1">
            <div class="slick1" style="">
                <div class="item-slick1" style="height: calc(530px); ">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2" style="color: #ddd">
                                    Sell ​​anything for nothing
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1"style="color: #ddd">
                                    Trade Now
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="100">
                                @if (auth()->check())
                                    <a href="{{ route('product.create') }}"
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        Post Now
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04"
                                        onclick="event.preventDefault(); showLoginAlert();">
                                        Post Now
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="banner-section">
        <div class="container">
            <div class="banner-grid">
                <!-- Feature Box 1 -->
                <div class="feature-box">
                    <div class="icon-wrapper">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Free Trading</h3>
                    <p>Trade items with zero commission fees</p>
                </div>

                <!-- Feature Box 2 -->
                <div class="feature-box">
                    <div class="icon-wrapper">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Secure Trading</h3>
                    <p>Safe and verified transactions</p>
                </div>

                <!-- Feature Box 3 -->
                <div class="feature-box">
                    <div class="icon-wrapper">
                        <i class="fas fa-sync"></i>
                    </div>
                    <h3>Easy Exchange</h3>
                    <p>Simple item swapping process</p>
                </div>

                <!-- Feature Box 4 -->
                <div class="feature-box">
                    <div class="icon-wrapper">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Community</h3>
                    <p>Join our growing trading community</p>
                </div>
            </div>
        </div>
    </section>

    <section style="background-color: #f8f9fa; padding: 10px;">
        <div class="container">
            <h3 style="color: #7c99b5; font-weight: bold;">Categories</h3>
            <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;">
                <a href="{{ route('/') }}"
                    style="padding: 10px 15px; background-color: #ffffff; border: 1px solid #ddd; border-radius: 5px; color: #333; text-decoration: none; display: inline-block;">
                    All
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('category.products', $category->id) }}"
                        class="{{ request()->route('id') == $category->id ? 'active' : '' }}"
                        style="padding: 10px 15px; background-color: #ffffff; border: 1px solid #ddd; border-radius: 5px; color: #333; text-decoration: none; display: inline-block;">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Suggested products
                </h3>
            </div>
            <div class="row">

                @foreach ($products as $product)
                    <div class="col-5-products">
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <!-- Product Image Carousel -->
                                <div id="carouselProduct{{ $product->id }}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($product->images as $key => $image)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img class="d-block w-100" src="{{ asset('storage/' . $image->path) }}"
                                                    alt="Product Image">
                                            </div>
                                        @endforeach


                                    </div>
                                    <!-- Previous and Next buttons -->
                                    <a class="carousel-control-prev" href="#carouselProduct{{ $product->id }}"
                                        role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselProduct{{ $product->id }}"
                                        role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <!-- View Details Button -->
                                <a href="{{ route('product.details', $product->id) }}"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                    View Details
                                </a>
                            </div>
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l">
                                    <p href="product-detail/{{ $product->id }}"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->name }}
                                    </p>

                                    <div class="flex items-center">
                                        <span class="text-lg font-medium text-gray-800 mr-2">
                                            {{ number_format($product->price, 2) }} JoD
                                        </span>
                                        <form method="POST" action="{{ route('wishlist.store') }}"
                                            class="inline-block wishlist-form" data-product-id="{{ $product->id }}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="button"
                                                class="wishlist-btn p-0 hover:text-red-500 transition-colors focus:outline-none">
                                                <span class="wishlist-icon">
                                                    @if ($product->isFavorited())
                                                        <!-- شرط للتحقق إذا كان المنتج في المفضلة -->
                                                        ❤️
                                                    @else
                                                        🤍
                                                    @endif
                                                </span>
                                            </button>
                                        </form>



                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>

        </div>
    </section>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.wishlist-btn').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default form submission
                    let form = this.closest('.wishlist-form');
                    let productId = form.dataset.productId;
                    let icon = form.querySelector('.wishlist-icon');

                    fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                product_id: productId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Toggle between full and empty heart
                                if (data.favorited) {
                                    icon.textContent = '❤️';
                                    // SweetAlert Success Message
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Added to Wishlist!',
                                        text: 'This product has been added to your wishlist.',
                                        confirmButtonText: 'Ok'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Optionally, you can perform additional actions here
                                        }
                                    });
                                } else {
                                    icon.textContent = '🤍';
                                    // SweetAlert Success Message for removal
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Removed from Wishlist!',
                                        text: 'This product has been removed from your wishlist.',
                                        confirmButtonText: 'Ok'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Optionally, you can perform additional actions here
                                        }
                                    });
                                }
                            } else {
                                // SweetAlert Error Message
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops!',
                                    text: 'An error occurred, please try again.',
                                    confirmButtonText: 'Ok'
                                });
                            }
                        })
                        .catch(error => {
                            // SweetAlert Error for network or other issues
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops!',
                                text: 'An error occurred, please try again.',
                                confirmButtonText: 'Ok'
                            });
                            console.error('Error:', error);
                        });
                });
            });
        });
    </script>
@endsection
