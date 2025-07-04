<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تعديل المنتج</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">✏️ تعديل المنتج</h2>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">الاسم:</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">الوصف:</label>
                <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">السعر:</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">الكمية:</label>
                <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
            </div>

            <button type="submit" class="btn btn-primary">💾 حفظ التعديلات</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
</body>
</html>
