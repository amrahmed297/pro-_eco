@extends('layout.master')

@section('content')

<div class="product-section mt-150 mb-150">
    <div class="container">
        <!-- عنوان القسم -->
        <div class="row mb-5">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Our</span> Products</h3>
                </div>
            </div>
        </div>

        <!-- المنتجات -->
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="single-product-item text-center">
                        <div class="product-image mb-3">
                            <a href="#">
                                <img  src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" style="width: 200px !important; height: 200px!important; object-fit: cover;">
                            </a>
                        </div>
                        <h3>{{ $product->name }}</h3>
                        <p class="product-price"><span>Per Piece</span> ${{ $product->price }}</p>
                        <a href="#" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>
</div>

@endsection