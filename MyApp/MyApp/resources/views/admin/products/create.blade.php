<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إضافة منتج</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4">    إضافة منتج جديد</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>الاسم:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>الوصف:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label>السعر:</label>
                <input type="number" name="price" step="0.01" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>الكمية:</label>
                <input type="number" name="stock" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">إضافة</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
<div class="mb-3">
    <label class="form-label">صورة المنتج:</label>
    <input type="file" name="image" class="form-control">
</div>

    </div>

</body>
</html>
