@extends('layouts.admin-layout')
@section('title', 'Test layout adminLTE')
@section('content')
    <div class="form_auth_acount">
        <form action="/auth-account/{{ $user->id }}" method="post">
            @csrf
            <div>
                <div>Username</div>
                <input type="text" value="{{ $user->username }}" class="auth_acount_input">

            </div>
            <div>
                <div>Email</div>
                <input type="text" value="{{ $user->email }}" class="auth_acount_input">

            </div>
            <div>
                <div>Vai trò</div>
                <select name="role" id="role" class="select_auth_acount">
                    <option value="0">Admin</option>
                    <option value="1">min/mod</option>
                    <option value="2">user</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn_auth_account">Tạo</button>
            </div>
        </form>
    </div>

    <style>
        .form_auth_acount {
            margin-left: 37%;
        }

        .form_auth_acount .auth_acount_input {
            width: 320px;
            height: 38px;
            border-radius: 10px;
            border: none;
        }

        .form_auth_acount .select_auth_acount {

            height: 38px;
            width: 320px;
            border-radius: 10px;
        }

        .form_auth_acount .btn_auth_account {
            height: 36px;
            width: 55px;
            border-radius: 10px;
            border: none;
            margin-top: 12px;
        }
    </style>
@endsection
