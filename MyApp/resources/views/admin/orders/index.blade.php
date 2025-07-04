{{-- resources/views/admin/orders/index.blade.php --}}
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>قائمة الطلبات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

    <div class="container">
        <h2 class="mb-4">🧾 قائمة الطلبات</h2>

        @if($orders->isEmpty())
            <div class="alert alert-info">لا توجد طلبات حالياً.</div>
        @else
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>المستخدم</th>
                        <th>عدد المنتجات</th>
                        <th>السعر الكلي</th>
                        <th>تاريخ الطلب</th>
                        <th>تفاصيل</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->orderItems->sum('quantity') }}</td>
                            <td>{{ $order->total_price }} شيكل</td>
                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">عرض</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">🔙 العودة للوحة التحكم</a>
    </div>

</body>
</html>
