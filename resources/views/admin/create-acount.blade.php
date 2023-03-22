@extends('layouts.admin-layout')
@section('title', 'Test layout adminLTE')
@section('content')
    <div class="form_create_acount">
        <form action="/create-acount" method="post">
            @csrf
            <div>
                <div>Username</div>
                <input type="text" value="{{ old('name') }}" name="name" id="name"
                    class="{{ $errors->has('name') ? 'error_create_acount_input' : 'create_acount_input' }}">
                <div class="error_create_acount">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>


            </div>
            <div>
                <div>Email</div>
                <input type="text" value="{{ old('email') }}" name="email" id="email"
                    class="{{ $errors->has('email') ? 'error_create_acount_input' : 'create_acount_input' }}">
                <div class="error_create_acount">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

            </div>
            <div>
                <div>Vai trò</div>
                <select name="role" id="role" class="select_create_acount">
                    <option value="0">Admin</option>
                    <option value="1">min/mod</option>
                    <option value="2">user</option>
                </select>
            </div>
            <div>
                <div>Password</div>
                <input type="password" name="password" id="password"
                    class="{{ $errors->has('password') ? 'error_create_acount_input' : 'create_acount_input' }}">
                <div class="error_create_acount">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>

            </div>
            <div>
                <div>Password confirmation</div>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="{{ $errors->has('password_confirmation') ? 'error_create_acount_input' : 'create_acount_input' }}">
            </div>
            <div>
                <button type="submit" class="btn_create_account">Tạo</button>
            </div>
        </form>
    </div>

    <style>
        .form_create_acount {
            margin-left: 37%;
        }

        .form_create_acount .error_create_acount {
            color: red
        }

        .form_create_acount .error_create_acount_input {
            width: 320px;
            height: 38px;
            border-radius: 10px;
            border: 1px solid red
        }

        .form_create_acount .create_acount_input {
            width: 320px;
            height: 38px;
            border-radius: 10px;
            border: none;
        }

        .form_create_acount .select_create_acount {
            height: 38px;
            width: 320px;
            border-radius: 10px;
        }

        .btn_create_account {
            height: 36px;
            width: 55px;
            border-radius: 10px;
            border: none;
            margin-top: 12px;
        }
    </style>
@endsection
