<h2>قائمة المنتجات</h2>

<a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">➕ إضافة منتج جديد</a>

<table class="table table-bordered bg-white">
    <thead class="table-dark">
        <tr>
            <th>الاسم</th>
            <th>الوصف</th>
            <th>السعر</th>
            <th>الكمية</th>
            <th>الصورة</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ Str::limit($product->description, 30) }}</td>
                <td>{{ number_format($product->price, 2) }} ₪</td>
                <td>{{ $product->stock }}</td>
                <td>
                    @if ($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" width="70" />
                    @else
                        لا توجد صورة
                    @endif
                </td>
                <td>
                    <a href="{{ route('front.products.show', $product->id) }}" target="_blank" class="btn btn-info btn-sm">عرض</a>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                    <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">لا توجد منتجات.</td>
            </tr>
        @endforelse
    </tbody>
</table>
