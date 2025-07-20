@extends('layout.master')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">إضافة منتج جديد</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="p-4 shadow rounded bg-white">
        @csrf

        {{-- اسم المنتج --}}
        <div class="form-group mb-3">
            <label for="name">اسم المنتج</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="أدخل اسم المنتج" required>
        </div>

        {{-- السعر --}}
        <div class="form-group mb-3">
            <label for="price">السعر</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="أدخل السعر" required>
        </div>

        {{-- الكمية --}}
        <div class="form-group mb-3">
            <label for="quantity">الكمية المتوفرة</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="عدد القطع" required>
        </div>

        {{-- التصنيف --}}
        <div class="form-group mb-3">
            <label for="category_id">الاقسام</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">-- اختر القسم --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- صورة المنتج --}}
        <div class="form-group mb-4">
            <label for="image">صورة المنتج</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>

        {{-- زر الحفظ --}}
        <button type="submit" class="btn btn-success w-100">💾 حفظ المنتج</button>
    </form>
</div>

@endsection