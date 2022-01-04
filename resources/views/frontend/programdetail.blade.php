@extends('layouts.app')

@section('title', "$program->title")
@section('bannertext', "$program->title")
@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-6">
                        <h1 style="color:black;font-size: 55px;font-weight:bolder">{{ $program->title }}</h1>
                        
                        <img src="{{ asset($program->photo) }}"
                            style="height: 500px; width:600px">
                        
                        <div style="color:black;font-size: 18px;padding-top: 15px;">{!! $program->detail !!}</div>
                        
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection