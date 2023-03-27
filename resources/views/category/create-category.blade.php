@extends('layouts.admin-layout')
@section('title', 'Test layout adminLTE')
@section('content')
    <div class="form_create_category">
        <form action="/create-category" method="POST">
            @csrf
            @method('POST')
            <div>
                <div>Tên danh mục</div>
                <input type="text" value="{{ old('name') }}" name="name" id="name"
                    class="{{ $errors->has('name') ? 'error_create_category_input' : 'create_category_input' }}">
                <div class="error_create_category">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <button type="submit" class="btn_create_category">Tạo</button>
            </div>
        </form>
    </div>

    <style>
        .form_create_category {
            margin-left: 37%;
        }

        .form_create_category .error_create_category {
            color: red
        }

        .form_create_category .error_create_category_input {
            width: 320px;
            height: 38px;
            border-radius: 10px;
            border: 1px solid red
        }

        .form_create_category .create_category_input {
            width: 320px;
            height: 38px;
            border-radius: 10px;
            border: none;
        }

        .form_create_category .select_create_category {
            height: 38px;
            width: 320px;
            border-radius: 10px;
        }

        .btn_create_category {
            height: 36px;
            width: 55px;
            border-radius: 10px;
            border: none;
            margin-top: 12px;
        }
    </style>
@endsection
