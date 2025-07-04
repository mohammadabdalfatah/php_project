@extends('layouts.app')

@section('title', '🛒 سلة المشتريات')

@section('content')
<div class="container py-5">
    <div class="bg-white shadow-lg rounded p-4">
        <h2 class="mb-4 text-center text-primary">🛒 سلة المشتريات</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if($cartItems->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>الصورة</th> {{-- 🖼️ العمود الجديد --}}
                            <th>المنتج</th>
                            <th>السعر</th>
                            <th>الكمية</th>
                            <th>الإجمالي</th>
                            <th>التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp

                        @foreach($cartItems as $item)
                            @php
                                $subtotal = $item->product->price * $item->quantity;
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $item->product->image) }}" width="60" height="60" class="rounded shadow-sm" alt="صورة المنتج">
                                </td>
                                <td class="fw-bold">{{ $item->product->name }}</td>
                                <td class="text-success">${{ number_format($item->product->price, 2) }}</td>
                                <td>
                                    <form method="POST" action="{{ route('cart.update', $item->id) }}" class="d-flex justify-content-center align-items-center gap-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control form-control-sm w-50 text-center border">
                                        <button class="btn btn-sm btn-outline-warning">تحديث</button>
                                    </form>
                                </td>
                                <td class="text-info">${{ number_format($subtotal, 2) }}</td>
                                <td>
                                    <form method="POST" action="{{ route('cart.destroy', $item->id) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">🗑 حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        <tr class="table-light fw-bold">
                            <td colspan="4" class="text-end">الإجمالي الكلي:</td>
                            <td colspan="2" class="text-success fs-5">${{ number_format($total, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('front.products.index') }}" class="btn btn-outline-primary">⬅ متابعة التسوق</a>
                <a href="#" class="btn btn-success">🧾 إتمام الطلب</a>
            </div>
        @else
            <div class="alert alert-info text-center">لا يوجد منتجات في السلة حالياً.</div>
            <div class="text-center">
                <a href="{{ route('front.products.index') }}" class="btn btn-primary mt-3">تصفح المنتجات</a>
            </div>
        @endif
    </div>
</div>
@endsection
