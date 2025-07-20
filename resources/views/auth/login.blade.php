@extends('layout.log')

@section('title', 'تسجيل الدخول')

@section('content')
    <h3>🔐 تسجيل الدخول</h3>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label>كلمة المرور</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">تذكرني</label>
        </div>

        <button type="submit" class="btn btn-primary btn-block">دخول</button>

        <p class="mt-2">ليس لديك حساب؟ <a href="{{ route('register') }}">سجّل الآن</a></p>
        
    </form>

@endsection
