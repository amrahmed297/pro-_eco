@extends('layout.log') {{-- لو عندك layout للـ login، أو استخدم layout.master لو بتحب --}}
@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">🔐 تسجيل دخول الأدمن</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" required placeholder="ادخل البريد الإلكتروني">
        </div>

        <div class="form-group">
            <label for="password">كلمة المرور</label>
            <input type="password" name="password" class="form-control" required placeholder="ادخل كلمة المرور">
        </div>

        <button type="submit" class="btn btn-primary mt-3">تسجيل الدخول</button>
        <a href="{{ url('/') }}" class="btn btn-link mt-3">⬅️ الرجوع إلى الصفحة الرئيسية</a>
    </form>
</div>

@endsection
