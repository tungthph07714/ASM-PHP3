<div>
    @foreach ($data as $item)
        {{ $item->title }}
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
<div>
    @foreach ($comment as $item)
        <div>
            {{ $item->user->username }}:
            {{ $item->content }}
            <div style="margin-left: 10px">
                @foreach ($item->parent as $i)
                    {{ $i->user_id }}:
                    {{ $i->content }}
                @endforeach
                <form action="/reply-comment/{{ $news_id }}" method="POST">
                    @csrf
                    <input type="text" name="comment_id" value="{{ $item->id }}" style="display:none">
                    <div>
                        <textarea name="content" id="">
                        </textarea>
                    </div>
                    <div>
                        <button type="submit">Lưu</button>
                    </div>
                </form>
            </div>

        </div>
    @endforeach
</div>
