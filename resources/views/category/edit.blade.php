@extends('layout.master')

@section('content')
<div class="container mt-5">
    <h3>✏️ تعديل القسم</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>اسم القسم</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="form-group">
            <label>الصورة الحالية:</label><br>
            @if ($category->image_path)
                <img src="{{ asset($category->image_path) }}" width="100"><br><br>
            @endif
            <label>تغيير الصورة:</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary mt-3">💾 حفظ التعديلات</button>
    </form>
</div>
@endsection
