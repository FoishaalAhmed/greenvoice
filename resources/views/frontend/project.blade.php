@extends('layouts.app')

@section('title', 'Project')
@section('bannertext', "Project")
@section('content')
    <main>
        <section class="container">
            @foreach ($projects as $item)
                
            
            <div class="row">
                <div class="col-lg-6 .col-md-12 col-sm-12">
                    <br> <br>
                    <br>

                    <h2 style="color :black" class="container">{{ $item->title }}</h2><br>
                    <p style="font-size: 18px;padding-right:29px;">{!! Str::limit($item->detail, 200) !!}</p>
                    <br>

                    <button class="btn btn-lg btn-danger mr-3 " onclick="window.open('{{ route("projects.show", [$item->id, $item->slug]) }}')" class="request-callback">Read More</button>
                </div>

                <div class="col-lg-6 .col-md-12 col-sm-12">
                    <br> <br>
                    <br>

                    <img src="{{ asset($item->photo) }}">
                    <br>
                    <br>
                    <br>

                </div>

            </div>
            @endforeach
        </section>
    </main>
@endsection