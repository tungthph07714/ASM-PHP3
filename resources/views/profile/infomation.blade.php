@extends('layouts.sub-page-layout')
@section('content-sub-page')
    <div class="row">
        <div class="col-md-12">
            <div class="titlepage text_align_center ">
                <h2>Thông tin cá nhân</h2>

            </div>
        </div>
    </div>

    <form id="request" action="/change-info/{{ $data->id }}" class="main_form" method="POST">
        @csrf
        <div class="row">

            <div class="col-md-12 ">
                <input class="form_control" placeholder="Your name" type="type" name="username"
                    value="{{ $data->username }}">
            </div>
            <div class="col-md-12">
                <input class="form_control" placeholder="Email" type="type" name="email" value="{{ $data->email }}">
            </div>

            <div class="col-md-12">
                <button class="send_btn" type="submit">Đổi thông tin</button>
            </div>
        </div>
    </form>
    </div>
@endsection
