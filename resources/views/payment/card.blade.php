@extends('layout.app')

@section('title', 'الدفع بالبطاقة')

@section('content')
    <h3>الدفع باستخدام بطاقة بنكية</h3>
    <p>هنا ممكن تضيف نموذج الدفع (Stripe - PayPal - بطاقة ائتمان ...)</p>
      <a href="{{ url('/') }}" class="btn btn-link mt-3">⬅️ الرجوع إلى الصفحة الرئيسية</a>
@endsection
