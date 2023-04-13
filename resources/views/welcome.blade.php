@extends('layouts.hone-page-layout')
@section('content-home-page')
    <!-- services -->
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage text_align_center ">
                        <h2>Our Massage Services</h2>
                    </div>
                </div>
            </div>

            <div class="grid-container" style="  display: grid; grid-template-columns: auto auto auto;">
                @foreach ($newsPost as $item)
                    <div>
                        <a href="/detail-news/{{ $item->id }}">
                            <div id="ho_shad" class="services_box text_align_left">

                                <figure><img src="{{ asset('dist/img/service1.jpg') }}" alt="#" /></figure>
                                <p style="color: #363636; font-size: 20px; line-height: 25px; font-weight: bold;">
                                    {{ $item->title }}</p>
                                <p>{{ $item->sub_title }}</p>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end services -->
@endsection
