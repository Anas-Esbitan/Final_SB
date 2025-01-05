@extends('userside.userside_source.userside_template')

@section('content')
    <div class="edit-product-container">
        <div class="form-wrapper">
            <div class="form-header">
                <h1>Edit Product</h1>
                <div class="header-line"></div>
            </div>

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
                class="luxury-form">
                @csrf
                @method('PUT')

                <div class="form-section">
                    <div class="input-group">
                        <label class="floating-label">Product Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" required>
                        <div class="input-line"></div>
                    </div>

                    <div class="input-group">
                        <label class="floating-label">Description</label>
                        <textarea name="description" rows="4">{{ $product->description }}</textarea>
                        <div class="input-line"></div>
                    </div>

                    <div class="two-columns">
                        <div class="input-group">
                            <label class="floating-label">Price</label>
                            <div class="price-input">
                                <span class="currency">JOD</span>
                                <input type="number" name="price" value="{{ $product->price }}" step="0.01">
                            </div>
                            <div class="input-line"></div>
                        </div>

                        <div class="input-group">
                            <label class="floating-label">Category</label>
                            <select name="category_id" class="styled-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="input-line"></div>
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="floating-label">Status</label>
                        <select name="status" class="styled-select">
                            <option value="New" {{ $product->status == 'New' ? 'selected' : '' }}>New</option>
                            <option value="used" {{ $product->status == 'used' ? 'selected' : '' }}>Used</option>
                            <option value="Used in new condition"
                                {{ $product->status == 'Used in new condition' ? 'selected' : '' }}>
                                Used in new condition
                            </option>
                        </select>
                        <div class="input-line"></div>
                    </div>

                    <div class="file-upload-group">
                        <label class="file-upload-label">
                            <span class="upload-icon">📸</span>
                            <span class="upload-text">Drop images here or click to upload</span>
                            <input type="file" name="images[]" multiple accept="image/*">
                        </label>
                    </div>
                </div>

                <button type="submit" class="submit-button">
                    <span class="button-text">Update Product</span>
                    <span class="button-icon">→</span>
                </button>
            </form>
        </div>
    </div>

    <style>
        .edit-product-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ed 100%);
            padding: 40px 20px;
        }

        .form-wrapper {
            max-width: 800px;
            margin: 60px auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            transform: translateY(0);
            transition: transform 0.3s ease;
        }

        .form-wrapper:hover {
            transform: translateY(-5px);
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h1 {
            color: #1a1a1a;
            font-size: 2.5em;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .header-line {
            height: 4px;
            width: 60px;
            background: linear-gradient(90deg, #4776E6 0%, #8E54E9 100%);
            margin: 0 auto;
            border-radius: 2px;
        }

        .luxury-form {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .form-section {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .input-group {
            position: relative;
            margin-bottom: 10px;
        }

        .floating-label {
            position: absolute;
            top: -21px;
            left: 10px;
            background: white;
            padding: 0 8px;
            color: #666;
            font-size: 0.9em;
            transition: all 0.3s ease;
        }

        .input-group input,
        .input-group textarea,
        .input-group select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e1e1;
            border-radius: 10px;
            font-size: 1em;
            transition: all 0.3s ease;
            background: transparent;
        }

        .input-group input:focus,
        .input-group textarea:focus,
        .input-group select:focus {
            border-color: #4776E6;
            outline: none;
            box-shadow: 0 0 0 4px rgba(71, 118, 230, 0.1);
        }

        .input-line {
            height: 2px;
            width: 0;
            background: linear-gradient(90deg, #4776E6 0%, #8E54E9 100%);
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: width 0.3s ease;
        }

        .input-group input:focus~.input-line,
        .input-group textarea:focus~.input-line,
        .input-group select:focus~.input-line {
            width: 100%;
        }

        .two-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .price-input {
            position: relative;
        }

        .currency {
            position: absolute;
            left: 78px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .price-input input {
            padding-left: 11px;
        }

        .styled-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23666' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 15px;
        }

        .file-upload-group {
            margin-top: 20px;
        }

        .file-upload-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 30px;
            border: 2px dashed #e1e1e1;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload-label:hover {
            border-color: #4776E6;
            background: rgba(71, 118, 230, 0.05);
        }

        .upload-icon {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .upload-text {
            color: #666;
            font-size: 0.9em;
        }

        .file-upload-label input {
            display: none;
        }

        .submit-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: linear-gradient(90deg, #4776E6 0%, #8E54E9 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-size: 1.1em;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(71, 118, 230, 0.2);
        }

        .button-icon {
            transition: transform 0.3s ease;
        }

        .submit-button:hover .button-icon {
            transform: translateX(5px);
        }

        @media (max-width: 768px) {
            .form-wrapper {
                padding: 20px;
            }

            .two-columns {
                grid-template-columns: 1fr;
            }

            .form-header h1 {
                font-size: 2em;
            }
        }

        /* Animation for form elements */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .input-group {
            animation: fadeIn 0.5s ease forwards;
        }

        .input-group:nth-child(2) {
            animation-delay: 0.1s;
        }

        .input-group:nth-child(3) {
            animation-delay: 0.2s;
        }

        .input-group:nth-child(4) {
            animation-delay: 0.3s;
        }
    </style>
@endsection
