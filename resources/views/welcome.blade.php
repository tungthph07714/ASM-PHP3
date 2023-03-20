<a href="/create-post">Tạo bài viết</a>
<a href="/browse-post">Duyệt bài viết</a>

@foreach ($newsPost as $item)
    <div>
        <a href="/detail-news/{{ $item->id }}">{{ $item->title }}</a>


    </div>
@endforeach
