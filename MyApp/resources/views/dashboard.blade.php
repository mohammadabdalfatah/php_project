{{-- resources/views/admin/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم - المشرف</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4">👨‍💼 لوحة تحكم المسؤول</h2>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">📦 المنتجات</h5>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-primary">إدارة المنتجات</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">🧾 الطلبات</h5>
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-success">عرض الطلبات</a>

                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">👥 المستخدمين</h5>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-info">إدارة المستخدمين</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card text-center p-3" style="margin-top: 30px;">
    <h5 class="mb-3">🔗 الذهاب إلى المتجر</h5>
    <a href="{{ url('/') }}" class="btn btn-warning">زيارة صفحة المتجر</a>
</div>


        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="btn btn-danger mt-4">تسجيل الخروج</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </div>

</body>
</html>
