@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold">مرحبًا بك في متجرنا</h2>
        <p class="text-muted">استعرض أفضل المنتجات بأفضل الأسعار</p>
    </div>

    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="صورة المنتج">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="بدون صورة">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                        <p class="fw-bold">السعر: {{ $product->price }} شيكل</p>
                        <a href="{{ route('front.products.show', $product->id) }}" class="btn btn-primary">عرض</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">لا يوجد منتجات حالياً.</p>
        @endforelse
    </div>
</div>
@endsection
