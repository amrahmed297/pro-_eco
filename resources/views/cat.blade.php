@extends('layout.master')
@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Products</h3>

                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <!-- فلتر التصنيفات -->
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h3 class="mb-3">Filter by Category</h3>
                        <div class="filter-buttons">
                            <a href="{{ route('categories.index') }}"
                                class="btn btn-outline-primary m-1 {{ is_null($categoryId) ? 'active' : '' }}">All</a>
                            @foreach ($categories as $category)
                                <a href="{{ route('categories.index', ['category' => $category->id]) }}"
                                    class="btn btn-outline-primary m-1 {{ $categoryId == $category->id ? 'active' : '' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- المنتجات -->
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 text-center mb-4">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="#"><img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}"
                                            style="width: 200px !important; height: 200px!important; object-fit: cover;"></a>
                                </div>
                                <h3>{{ $product->name }}</h3>

                                <p class="product-price"><span>Per Piece</span> {{ $product->price }}$</p>
                                                                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <button type="submit" class="cart-btn">
        <i class="fas fa-shopping-cart"></i> Add to Cart
    </button>
</form>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection