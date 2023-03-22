@extends('layouts.admin-layout')
@section('content')
    <table style="width:100%; margin-bottom: 15px;">
        <tr>
            <th>Tên</th>
            <th>Email</th>
            <th>Vai trò</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
        @foreach ($user as $item)
            <tr>
                <td> {{ $item->username }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    @switch($item->role)
                        @case(0)
                            {{ 'admin' }}
                        @break

                        @case(1)
                            {{ 'min/mod' }}
                        @break

                        @case(2)
                            {{ 'user' }}
                        @break

                        @default
                    @endswitch
                </td>
                <td>{{ $item->status == 1 ? 'Hoạt động' : 'Dừng hoạt động' }}</td>
                <td>
                    @if ($item->status == 1)
                        <form action="/disable-account/{{ $item->id }}" method="post">
                            @csrf
                            <button>Vô hiệu hóa</button>
                        </form>

                        <a href="/auth-account/{{ $item->id }}">Phân quyền</a>
                    @else
                        <form action="/enable-account/{{ $item->id }}" method="post">
                            @csrf
                            <button> Mở lại tài khoản</button>
                        </form>
                    @endif

                </td>
            </tr>
        @endforeach
    </table>
    <a href="/create-acount" class="create-acount">Tạo tài khoản</a>
    <style>
        table,
        th,
        td {
            border: 1px solid white;
        }

        .create-acount {
            padding: 8px;
            margin-top: 8px;
            background: white;
            border-radius: 10px;
        }
    </style>
@endsection
