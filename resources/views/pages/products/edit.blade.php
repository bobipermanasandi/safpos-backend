@extends('layouts.app')

@section('title', 'Create Product')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Product - {{ $product->name }}</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    name="name" value="{{ $product->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number"
                                    class="form-control @error('price')
                                is-invalid
                            @enderror"
                                    name="price" value="{{ $product->price }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number"
                                    class="form-control @error('stock')
                                is-invalid
                            @enderror"
                                    name="stock" value="{{ $product->stock }}">
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Category</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="category" value="food" class="selectgroup-input"
                                            @if ($product->category == 'food') checked @endif>
                                        <span class="selectgroup-button">Food</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="category" value="drink" class="selectgroup-input"
                                            @if ($product->category == 'drink') checked @endif>
                                        <span class="selectgroup-button">Drink</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="category" value="snack" class="selectgroup-input"
                                            @if ($product->category == 'snack') checked @endif>
                                        <span class="selectgroup-button">Snack</span>
                                    </label>

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Photo Product</label>
                                <div class="col-sm-9">
                                    <img id="image-exist" src="{{ asset('/storage/products/' . $product->images) }}"
                                        alt=" " width="200px" class="img-thumbnail mb-2">

                                    <img id="preview" src="#" alt="Preview Gambar"
                                        style="display: none; max-width: 200px;" class="img-thumbnail mb-2">

                                    <input type="file" class="form-control" name="images" onchange="previewImage(event)"
                                        @error('images') is-invalid @enderror>
                                </div>
                                @error('images')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const imgExist = document.getElementById('image-exist');
                imgExist.style.display = 'none';
                const output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
