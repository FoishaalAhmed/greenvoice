@extends('layouts.app')

@section('title', 'Blog')
@section('bannertext', 'Blog')
@section('content')
    <main>
        <section class="container">
            @foreach ($blogs as $item)
                
            
            <div class="row">
                <div class="col-lg-3 .col-md-12 col-sm-12">
                    <img src="{{ asset($item->photo) }}"
                        style="height: 314px; width:313px">
                </div>

                <div class="col-lg-3 .col-md-12 col-sm-12">

                </div>

                <div style="margin-top:150px;" class="col-lg-6 .col-md-12 col-sm-12">
                    <p style="color :black" class="container"> {{ $item->date }}</p><br>
                    <h1 style="font-size:px;padding-right:px;">{{ $item->title }} </h1>
                    <br>
                    <u style="color:chocolate;">
                        <p><a style="font-size:20px;color:chocolate;" href="{{ route('blogs.show', [$item->id, $item->slug]) }}"> Read More</a></p>
                    </u>
                </div>


            </div>

            @endforeach

        </section>
    </main>
@endsection
