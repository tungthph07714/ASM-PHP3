@extends('layouts.admin-layout')
@section('title', 'Test layout adminLTE')
@section('content')
    <div class="form_edit_category">
        <form action="/edit-category/{{ $record->id }}" method="POST">
            @csrf
            @method('POST')
            <div>
                <div>Tên danh mục</div>
                <input type="text" value="{{ old('name', $record->name) }}" name="name" id="name"
                    class="{{ $errors->has('name') ? 'error_edit_category_input' : 'edit_category_input' }}">
                <div class="error_edit_category">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div>
                <button type="submit" class="btn_edit_category">Sửa</button>
            </div>
        </form>
    </div>

    <style>
        .form_edit_category {
            margin-left: 37%;
        }

        .form_edit_category .error_edit_category {
            color: red
        }

        .form_edit_category .error_edit_category_input {
            width: 320px;
            height: 38px;
            border-radius: 10px;
            border: 1px solid red
        }

        .form_edit_category .edit_category_input {
            width: 320px;
            height: 38px;
            border-radius: 10px;
            border: none;
        }

        .form_edit_category .select_edit_category {
            height: 38px;
            width: 320px;
            border-radius: 10px;
        }

        .btn_edit_category {
            height: 36px;
            width: 55px;
            border-radius: 10px;
            border: none;
            margin-top: 12px;
        }
    </style>
@endsection
