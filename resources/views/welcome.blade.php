@extends('layouts.admin-layout')
@section('title', 'Test layout adminLTE')
@section('content')
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
    @foreach ($newsPost as $item)
        <div>
            <a href="/detail-news/{{ $item->id }}">{{ $item->title }}</a>

        </div>
    @endforeach
@endsection
<a href="/create-post">Tạo bài viết</a>
<a href="/browse-post">Duyệt bài viết</a>
