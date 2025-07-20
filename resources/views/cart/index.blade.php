@extends('layout.app')

@section('title', 'سلة المشتريات')

@section('content')
    <h2 class="mb-4">سلة المشتريات</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse($cartItems as $item)
        <div class="card mb-2 p-3">
            <h5>{{ $item->product->name }}</h5>
            <p>الكمية: {{ $item->quantity }}</p>
            <p>السعر: {{ $item->product->price }} $</p>
            <img src="{{ asset($item->product->image_path) }}" alt="{{ $item->product->name }}" width="150"
                class="img-thumbnail">








            <form action="{{ url('/cart/remove/' . $item->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
            </form>
        </div>
    @empty
        <p>سلة المشتريات فارغة.</p>
    @endforelse
                @if($cartItems->count() > 0)
                <div class="card mt-4 p-3 bg-light">
                    <h4>الإجمالي: {{ $total }} $</h4>
                </div>
            @endif
 <form action="{{ route('checkout') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>اختر طريقة الدفع:</label><br>
        <input type="radio" name="payment_method" value="cod" checked> الدفع عند الاستلام<br>
        <input type="radio" name="payment_method" value="card"> الدفع ببطاقة بنكية
    </div>

    <button type="submit" class="btn btn-primary mt-2">إتمام الدفع</button>
</form>


@endsection