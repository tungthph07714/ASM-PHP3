<div>
    @foreach ($data as $item)
        {{ $item->title }}
    @endforeach
</div>

<div>
    @foreach ($comment as $item)
        <div>
            {{ $item->user->username }}:

            {{ $item->content }}
        </div>
    @endforeach
</div>

<form action="/detail-news/{{ $news_id }}" method="POST">
    @csrf
    <div>
        <textarea name="content" id="">
        </textarea>
    </div>
    <div>
        <button type="submit">Lưu</button>
    </div>
</form>
