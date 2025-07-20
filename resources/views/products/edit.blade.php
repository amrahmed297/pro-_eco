@extends('layout.master')
@section('content')
<div class="container mt-5">
    <h3>✏️ تعديل المنتج</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>الاسم</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label>السعر</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label>الكمية</label>
            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
        </div>

        <div class="form-group">
            <label>القسم</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>الصورة الحالية:</label><br>
            <img src="{{ asset($product->image_path) }}" width="100"><br><br>
            <label>تغيير الصورة:</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary mt-3">💾 حفظ التعديلات</button>
    </form>
</div>
@endsection