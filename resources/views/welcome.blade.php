@extends('layouts.app')

@section('title')
    مرحبا
@endsection

@section('content')

    <div id="owl-demo" class="owl-carousel owl-theme">
        @foreach(\App\Photo::latest()->take(3)->get() as $photo)
            <div class="item"><img src="{{asset('storage/' . $photo->path)}}"></div>
        @endforeach
    </div>

    <div class="hidden">
        <a class="btn owl-btn next"><span class="fa fa-angle-right"></span></a>
        <a class="btn owl-btn prev"><span class="fa fa-angle-left"></span></a>
    </div>

@endsection
