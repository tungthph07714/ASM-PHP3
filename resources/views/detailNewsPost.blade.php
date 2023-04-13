@extends('layouts.sub-page-layout')
@section('content-sub-page')
    <div>

        <h1>{{ $data->title }}</h1>
        <h2>{{ $data->sub_title }}</h2>
        <p>{{ $data->comment }}</p>
        {!! Share::page('http://127.0.0.1:8000/detail-news/3', $data->title)->facebook()->twitter()->whatsapp() !!}

    </div>
    <div class="form-comment">
        <form action="/detail-news/{{ $news_id }}" method="POST">
            @csrf
            <div>
                <textarea name="content" id="content">
                {{ old('content') }}
            </textarea>
                <div class="error_create_category">
                    @error('content')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <button type="submit">Lưu</button>
            </div>
        </form>
    </div>

    <div>

        @foreach ($comment as $item)
            <div>
                <strong>{{ $item->user->username }}</strong> :
                {{ $item->content }}

                <div>
                    <p style="cursor: pointer" onclick="replyComment()">Phản hồi</p>
                    @if (($user->id == $item->user->id) | ($user->role != 2))
                        <a href="">Xóa</a>
                    @endif

                </div>
                <div style="margin-left: 10px; display:none;" class="reply-comment" id="reply-comment">
                    @foreach ($item->parent as $i)
                        {{ $i->user_id }}:
                        {{ $i->content }}
                    @endforeach
                    <form action="/reply-comment/{{ $news_id }}" method="POST">
                        @csrf
                        <input type="text" name="comment_id" value="{{ $item->id }}" style="display:none">
                        <div>
                            <textarea name="content_reply" id="content_reply">
                            {{ old('content_reply') }}
                        </textarea>
                            <div class="error_create_category">
                                @error('content_reply')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div>
                            <button type="submit">Lưu</button>
                        </div>
                    </form>
                </div>

            </div>
        @endforeach
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        div#social-links ul li {
            display: inline-block;
        }

        div#social-links ul li a {
            padding: 20px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 30px;
            color: #222;
            background-color: #ccc;
        }

        .error_create_category {
            color: red
        }
    </style>
    <script>
        var modal = document.getElementById("reply-comment");

        function replyComment() {
            if (modal.style.display == 'none') {
                modal.style.display = "block";
            } else {
                modal.style.display = "none";
            }

        }
    </script>
@endsection
