@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">🛒 السلة</h2>

    @if($cartItems->isEmpty())
        <div class="alert alert-info">السلة فارغة حالياً.</div>
    @else
        {{-- جدول عرض المنتجات في السلة --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>المنتج</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                    <th>الإجمالي</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->product->price, 2) }} ₪</td>
                        <td>{{ number_format($item->quantity * $item->product->price, 2) }} ₪</td>
                        <td>
                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">🗑 حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('checkout.index') }}" class="btn btn-primary">إتمام الطلب</a>
    @endif
</div>
@endsection
