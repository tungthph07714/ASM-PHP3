@extends('layouts.admin-layout')
@section('content')
    <table style="width:100%; margin-bottom: 15px;">
        <tr>
            <th>ID</th>
            <th>Danh mục</th>
            <th>Tác giả</th>
            <th>Trạng thái</th>
            <th>Tiêu đề</th>
            @if ($user->role == 0)
                <th>Hành động</th>
            @endif

        </tr>
        @foreach ($post as $item)
            <tr>
                <td> {{ $item->id }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->user->username }}</td>
                <td>
                    @switch($item->status)
                        @case(0)
                            {{ 'Đang chờ duyệt' }}
                        @break

                        @case(1)
                            {{ 'Đang hiển thị' }}
                        @break

                        @case(2)
                            {{ 'Đã bị gỡ' }}
                        @break

                        @default
                    @endswitch

                <td>{{ $item->title }}</td>
                @if ($user->role == 0)
                    <td>
                        @if ($item->status == 1)
                            <form action="/remove-post/{{ $item->id }}" method="post">
                                @csrf
                                <button>Gỡ bài</button>
                            </form>
                        @else
                            <form action="/push-post/{{ $item->id }}" method="post">
                                @csrf
                                <button>Đăng bài</button>
                            </form>
                        @endif
                    </td>
                @endif

            </tr>
        @endforeach
    </table>
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
