@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">👥 إدارة المستخدمين</h2>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>الرقم</th>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>تاريخ التسجيل</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">لا يوجد مستخدمين</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
