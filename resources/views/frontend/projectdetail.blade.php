@extends('layouts.app')

@section('title', "$project->title")
@section('bannertext', "$project->title")
@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-6">
                        <h1 style="color:black;font-size: 25px;font-weight:bolder">{{ $project->title }}</h1>
                        
                        <img src="{{ asset($project->photo) }}"
                            style="height: 500px; width:600px">
                        
                        <div style="color:black;font-size: 18px;padding-top: 15px;">{!! $project->detail !!}</div>
                        
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection