@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card shadow">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="صورة المنتج">
                @else
                    <img src="https://via.placeholder.com/600x400?text=No+Image" class="card-img-top" alt="بدون صورة">
                @endif

                <div class="card-body">
                    <h3 class="card-title">{{ $product->name }}</h3>
                    <p class="card-text">{{ $product->description }}</p>
                    <p><strong>السعر:</strong> {{ $product->price }} شيكل</p>
                    <p><strong>الكمية المتوفرة:</strong> {{ $product->stock }}</p>
                    <a href="{{ route('home') }}" class="btn btn-secondary">رجوع</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
