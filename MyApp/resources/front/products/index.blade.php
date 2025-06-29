<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>كل المنتجات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">🛍️ كل المنتجات</h2>

    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="صورة المنتج">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="بدون صورة">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($product->description, 80) }}</p>
                        <p class="card-text fw-bold">${{ $product->price }}</p>
                        <button class="btn btn-primary w-100" disabled>أضف إلى السلة</button> {{-- لاحقًا نفعلها --}}
                    </div>
                </div>
            </div>
            <a href="{{ route('front.products.show', $product->id) }}" class="btn btn-outline-secondary mt-2 w-100">عرض التفاصيل</a>

        @empty
            <p>لا توجد منتجات حالياً.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>

</body>
</html>
