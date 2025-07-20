@extends('layout.master')

@section('content')

    <div class="product-section mt-150 mb-150">
        <div class="container">
            <!-- عنوان -->
            <div class="row mb-5">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Categories</h3>
                    </div>
                </div>
            </div>

            <!-- عرض الأقسام -->
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="single-product-item text-center">
                            <div class="product-image mb-3">
                                <a href="#" data-toggle="modal" data-target="#categoryModal{{ $category->id }}">
                                    <img src="{{ asset($category->image_path) }}" alt="{{ $category->name }}"
                                        style="width: 200px !important; height: 200px!important; object-fit: cover;">
                                </a>
                            </div>
                            <h3>{{ $category->name }}</h3>
                        </div>
                    </div>

                    <!-- Modal للمنتجات -->
                    <div class="modal fade" id="categoryModal{{ $category->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="modalLabel{{ $category->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content p-4">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $category->name }} - المنتجات</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="إغلاق">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @php
                                        $productsInCategory = $products->where('category_id', $category->id);
                                    @endphp

                                    @if ($productsInCategory->isEmpty())
                                        <p>لا توجد منتجات في هذا القسم.</p>
                                    @else
                                        <div class="row">
                                            @foreach ($productsInCategory as $product)
                                                <div class="col-md-6 mb-3">
                                                    <div class="border rounded p-3 text-center">
                                                        <img src="{{ asset($product->image_path) }}"
                                                            style="width: 120px; height: 120px; object-fit: cover;">
                                                        <h5 class="mt-2">{{ $product->name }}</h5>
                                                        <p>السعر: {{ $product->price }} ج.م</p>
                                                        <p>الكمية: {{ $product->quantity }}</p>
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
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection