@extends('layouts.app')

@section('title', 'تفاصيل الطلب')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">📄 تفاصيل الطلب #{{ $order->id }}</h2>

    <div class="mb-3">
        <strong>تاريخ الطلب:</strong> {{ $order->created_at->format('Y-m-d H:i') }}<br>
        <strong>الإجمالي الكلي:</strong> ${{ number_format($order->total_price, 2) }}
    </div>

    <table class="table table-bordered text-center align-middle">
        <thead class="table-light">
            <tr>
                <th>المنتج</th>
                <th>السعر</th>
                <th>الكمية</th>
                <th>الإجمالي</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">⬅️ العودة لطلباتي</a>
</div>
@endsection
