@extends('layouts.sub-page-layout')
@section('content-sub-page')
    <div class="row">
        <div class="col-md-12">
            <div class="titlepage text_align_center ">
                <h2>Latest Blog</h2>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu</p>
            </div>
        </div>
    </div>
    @foreach ($data as $item)
        {{ $item->title }}
    @endforeach
    <div class="row d_flex">
        <div class=" col-md-4">
            <div class="latest">
                <figure><img src="{{ asset('dist/img/blog1.jpg') }}" alt="#" /></figure>
                <span>16 March</span>
                <div class="nostrud">
                    <h3>Quis Nostrud </h3>
                    <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                    <a class="read_more" href="blog.html">Read More</a>
                </div>
            </div>
        </div>
    </div>
@endsection
