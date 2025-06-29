@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>تفاصيل المنتج</h2>

        <p><strong>الاسم:</strong> {{ $product->name }}</p>
        <p><strong>الوصف:</strong> {{ $product->description }}</p>
        <p><strong>السعر:</strong> {{ $product->price }} $</p>
        <p><strong>الكمية:</strong> {{ $product->stock }}</p>

        <p><strong>الصورة:</strong></p>
        @if ($product->image)
            <img src="{{ asset('storage/'.$product->image) }}" width="150">
        @else
            <p>لا توجد صورة</p>
        @endif

        <br><br>
        <a href="{{ route('admin.products.index') }}">العودة لقائمة المنتجات</a>
    </div>
@endsection
