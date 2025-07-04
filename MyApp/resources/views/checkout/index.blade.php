@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">مراجعة الطلب</h2>

    @if($cartItems->isEmpty())
        <p>سلتك فارغة.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>المنتج</th>
                    <th>السعر</th>
                    <th>الكمية</th>
                    <th>الإجمالي</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->product->price }}$</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->product->price * $item->quantity }}$</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"><strong>المجموع الكلي</strong></td>
                    <td><strong>{{ $total }}$</strong></td>
                </tr>
            </tbody>
        </table>

        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf
            <button type="submit" class="btn btn-success">تأكيد الطلب</button>
        </form>
    @endif
</div>
@endsection
