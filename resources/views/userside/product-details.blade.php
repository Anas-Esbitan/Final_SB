@extends('userside.userside_source.userside_template')

@section('content')
    <style>
        /* Comments Container Styles */
        .comments-container {
            margin-top: 50px;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        }

        .comments-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eee;
            font-weight: 600;
        }

        /* Comment Form Styles */
        .comment-form-wrapper {
            margin-bottom: 40px;
            background: #f8f9fa;
            padding: 25px;
            border-radius: 12px;
        }

        .comment-form-wrapper textarea.form-control {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            min-height: 100px;
            background: #fff;
            transition: all 0.3s ease;
        }

        .comment-form-wrapper textarea.form-control:focus {
            border-color: #3052ce;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }

        .comment-form-wrapper .btn-primary {
            background: #6c43e9;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 500;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .comment-form-wrapper .btn-primary:hover {
            background: #2e3bae;
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(76, 175, 80, 0.2);
        }

        /* Comments List Styles */
        .comments-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .comment-item {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #eee;
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease-out;
        }

        .comment-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .user-name {
            font-weight: 600;
            color: #2c3e50;
            font-size: 16px;
        }

        .comment-date {
            color: #888;
            font-size: 14px;
        }

        .comment-content {
            color: #4a4a4a;
            line-height: 1.6;
            font-size: 15px;
        }

        /* Animation for new comments */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Product Section Enhancements */
        .wrap-pic-w img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .wrap-pic-w img:hover {
            transform: scale(1.02);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .comments-container {
                padding: 20px;
                margin-top: 30px;
            }

            .comment-item {
                padding: 15px;
            }

            .wrap-pic-w img {
                height: 300px;
            }
        }
    </style>
    <div class="container">
        <br><br>
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <!-- Product Section -->
            <div class="row">
                <!-- Image Gallery Section -->
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                            <div class="slick3 gallery-lb">
                                @foreach ($product->images as $image)
                                    <div class="item-slick3" data-thumb="{{ asset('storage/' . $image->path) }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->name }}">
                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="{{ asset('storage/' . $image->path) }}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Details Section -->
                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $product->name }}
                        </h4>
                        @if ($product->user_id === auth()->id())
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        @endif
                        <span class="mtext-106 cl2">
                            {{ number_format($product->price, 2) }} JOD
                        </span>
                        <p class="stext-102 cl3 p-t-23">
                            {{ $product->description }}
                        </p>
                        <span>Status: </span>
                        <span class="badge badge-info">{{ $product->status }}</span>
                        <div class="p-t-33">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactModal">
                                Connect
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comments Section - Now Full Width -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="comments-container">
                        <h4 class="comments-title">Comments</h4>

                        <!-- Add Comment Form -->
                        <div class="comment-form-wrapper">
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <textarea name="comment" class="form-control" placeholder="Share your thoughts..." required></textarea>
                                </div>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-primary">Comment</button>
                            </form>
                        </div>

                        <!-- Comments List -->
                        <div class="comments-list">
                            @foreach ($product->comments as $comment)
                                <div class="comment-item">
                                    <div class="comment-header">
                                        <span class="user-name">{{ $comment->user->First_name }}</span>
                                        <span class="comment-date">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="comment-content">
                                        {{ $comment->comment }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Modal -->
        <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <br><br><br><br><br>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contactModalLabel">Contact Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Name:</strong> {{ $product->user->First_name }}</p>
                        <p><strong>Phone:</strong> {{ $product->user->phone_number }}</p>
                        <p><strong>Email:</strong> {{ $product->user->email }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection
