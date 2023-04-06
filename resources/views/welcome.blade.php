@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">logout</button>
            </form>
            @php
                $user = Auth::user();
            @endphp

            @if ($user->role != 2)
                <a href="/post">Quản lý</a>
            @endif
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

<script>
    fetch("http://127.0.0.1:8000/api/list-post")
        .then((response) => response.json())
        .then((data) => console.log(data));
</script>
