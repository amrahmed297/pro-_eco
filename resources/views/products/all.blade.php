@extends('layout.master');
@section('content')
<div class="container my-5">
    {{-- المنتجات --}}
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>🛒 قائمة المنتجات</h2>
            <a href="{{ route('products.add') }}" class="btn btn-success">➕ إضافة منتج</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>الصورة</th>
                    <th>الاسم</th>
                    <th>السعر</th>
                    <th>الكمية</th>
                    <th>القسم</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td><img src="{{ asset($product->image_path) }}" width="60" height="60" style="object-fit: cover;"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }} ج.م</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->category->name ?? 'غير محدد' }}</td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary">تعديل</a>
                        <a href="{{ route('product.delete', $product->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- الأقسام --}}
    <div>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>📁 قائمة الأقسام</h2>
            <a href="{{ route('categories.add') }}" class="btn btn-info">➕ إضافة قسم</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>الاسم</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cat)
                <tr>
                    <td>{{ $cat->name }}</td>
                    <td>
                        <a href="{{ route('category.edit', $cat->id) }}" class="btn btn-sm btn-primary">تعديل</a>
                        <a href="{{ route('category.delete', $cat->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- إضافة أدمن جديد (خاص بالسوبر أدمن فقط) --}}
@if(session('is_admin_logged_in') && session('is_super'))
    <div class="mt-5">
        <h3>➕ إضافة أدمن جديد</h3>

        {{-- رسائل النجاح أو الخطأ --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>الاسم:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>البريد الإلكتروني:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>كلمة المرور:</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" name="is_super" class="form-check-input" id="superCheck">
                <label class="form-check-label" for="superCheck">سوبر أدمن؟</label>
            </div>

            <button type="submit" class="btn btn-primary">إضافة الأدمن</button>
        </form>
    </div>
@endif

</div>
@endsection