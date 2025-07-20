@extends('layout.log')

@section('title', 'إنشاء حساب جديد')

@section('content')
    <h3>📝 التسجيل</h3>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label>الاسم</label>
            <input type="text" name="name" class="form-control" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>كلمة المرور</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>تأكيد كلمة المرور</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success btn-block">تسجيل</button>

        <p class="mt-2">هل لديك حساب؟ <a href="{{ route('login') }}">سجّل الدخول</a></p>
    </form>
@endsection
