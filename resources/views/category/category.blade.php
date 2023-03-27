@extends('layouts.admin-layout')
@section('content')
    <table style="width:100%; margin-bottom: 15px;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td> {{ $item->id }}</td>
                <td> {{ $item->name }}</td>
                <td>{{ $item->status == 1 ? 'Đang hiển thị' : 'Đã ẩn' }}</td>
                <td>
                    @if ($item->status == 1)
                        <form action="/disable-category/{{ $item->id }}" method="post">
                            @csrf
                            <button>Ẩn danh mục</button>
                        </form>
                    @else
                        <form action="/enable-category/{{ $item->id }}" method="post">
                            @csrf
                            <button>Hiện danh mục</button>
                        </form>
                    @endif
                    <a href="/edit-category/{{ $item->id }}">Chỉnh sửa danh mục</a>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="/create-category" class="create-category">Tạo danh mục</a>
    <style>
        table,
        th,
        td {
            border: 1px solid white;
        }

        .create-category {
            padding: 8px;
            margin-top: 8px;
            background: white;
            border-radius: 10px;
        }
    </style>
@endsection
