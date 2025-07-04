<h2>قائمة المنتجات</h2>

<a href="{{ route('admin.products.create') }}">إضافة منتج جديد</a>

<table>
    <thead>
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
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    @if ($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}" width="70" />
                    @else
                        لا توجد صورة
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.products.show', $product->id) }}">عرض</a> |
                    <a href="{{ route('admin.products.edit', $product->id) }}">تعديل</a> |
                    <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">حذف</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">لا توجد منتجات.</td>
            </tr>
        @endforelse
    </tbody>
</table>
