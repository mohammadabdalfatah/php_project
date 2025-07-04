@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if(!$product)
        <div class="alert alert-danger text-center">المنتج غير موجود.</div>
    @else
        <div class="card mb-3" style="max-width: 900px; margin: auto;">
            <div class="row g-0">
                <div class="col-md-5">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-start" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('default-product.png') }}" class="img-fluid rounded-start" alt="صورة غير متوفرة">
                    @endif
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <p class="card-text"><strong>الوصف:</strong> {{ $product->description }}</p>
                        <p class="card-text"><strong>السعر:</strong> {{ number_format($product->price, 2) }} ₪</p>
                        <p class="card-text"><strong>الكمية المتوفرة:</strong> {{ $product->stock }}</p>

                        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">رجوع</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
