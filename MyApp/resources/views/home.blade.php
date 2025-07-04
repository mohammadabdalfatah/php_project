@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">منتجاتنا</h2>
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('default-product.png') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="صورة غير متوفرة">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p class="card-text"><strong>{{ number_format($product->price, 2) }} ₪</strong></p>
                        <a href="{{ route('front.products.show', $product->id) }}" class="btn btn-primary">عرض التفاصيل</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">لا توجد منتجات حالياً.</p>
        @endforelse
    </div>
</div>
@endsection
