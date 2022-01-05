@extends('layouts.app')

@section('title', "$blog->title")
@section('bannertext', "$blog->title")
@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-6">
                        <h1 style="color:black;font-size: 25px;font-weight:bolder">{{ $blog->title }}</h1>
                        
                        <img src="{{ asset($blog->photo) }}"
                            style="height: 500px; width:600px">
                        
                        <div style="color:black;font-size: 18px;padding-top: 15px;">{!! $blog->content !!}</div>
                        
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection