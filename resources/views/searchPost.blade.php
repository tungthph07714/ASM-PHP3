@extends('layouts.sub-page-layout')
@section('content-sub-page')
    @foreach ($data as $i)
        <div>
            <h2>{{ $i->title }}</h2>
            <h3>{{ $i->sub_title }}</h3>
        </div>
    @endforeach
@endsection
