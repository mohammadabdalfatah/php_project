
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إدارة المنتجات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4">📦 إدارة المنتجات</h2>

        <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">➕ إضافة منتج</a>

        <table class="table table-bordered bg-white">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>الوصف</th>
                    <th>السعر</th>
                    <th>الكمية</th>
                    <th>الخيارات</th>
                    <th>الصورة</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ Str::limit($product->description, 30) }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                            </form>
                        </td>
                        <td>
    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="صورة المنتج" width="70">
    @else
        لا يوجد
    @endif
</td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-4">🔙 العودة للوحة التحكم</a>
    </div>

</body>
</html>
