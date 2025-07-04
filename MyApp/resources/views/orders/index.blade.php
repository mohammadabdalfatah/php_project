@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">جميع الطلبات</h2>

    @forelse($orders as $order)
        <div class="card mb-3">
            <div class="card-header">
                <strong>طلب #{{ $order->id }}</strong> - المستخدم: {{ $order->user->name }} - الحالة: {{ $order->status }}
            </div>
            <div class="card-body">
                @foreach($order->orderItems as $item)
                    <p>
                        المنتج: {{ $item->product->name ?? 'محذوف' }}<br>
                        الكمية: {{ $item->quantity }}
                    </p>
                @endforeach
            </div>
        </div>
    @empty
        <p>لا توجد طلبات حالياً.</p>
    @endforelse
</div>
@endsection
