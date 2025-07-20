@extends('layout.master')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">➕ إضافة قسم جديد</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="name">اسم القسم</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="اكتب اسم القسم" required>
            @error('name')
                <small class="text-danger d-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
    <label for="image">صورة القسم</label>
    <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
    @error('image')
        <small class="text-danger d-block">{{ $message }}</small>
    @enderror
</div>

        <button type="submit" class="btn btn-primary mt-2">حفظ</button>
    </form>
</div>
@endsection
