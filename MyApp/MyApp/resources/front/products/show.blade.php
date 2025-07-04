<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="صورة المنتج">
            @else
                <img src="https://via.placeholder.com/600x400?text=No+Image" class="img-fluid rounded" alt="بدون صورة">
            @endif
        </div>

        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p class="text-muted">{{ $product->description }}</p>
            <h4 class="text-success">${{ $product->price }}</h4>
            <p><strong>الكمية المتاحة:</strong> {{ $product->stock }}</p>

            <button class="btn btn-primary" disabled>🛒 أضف إلى السلة</button> {{-- سنفعّل السلة لاحقاً --}}
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('front.products.index') }}" class="btn btn-secondary">🔙 العودة للمنتجات</a>
    </div>
</div>

</body>
</html>
