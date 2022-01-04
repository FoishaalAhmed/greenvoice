@extends('layouts.app')

@section('title', 'Program')
@section('bannertext', "Program")
@section('content')
    <main>
        <section class="container">
            <div class="row">
            @foreach ($programs as $item)
            @if ($loop->odd)
                <div class="col-lg-6 .col-md-12 col-sm-12">
                <br> <br>
                <br>
                <img src="{{ asset($item->photo) }}" alt="" srcset="" style="height: 285px;width: 332px">
                <br>
                <br>
                <br>
            </div>
            <div class="col-lg-6 .col-md-12 col-sm-12">
                <br> <br>
                <br>
                <h1 style="color :black">{{ $item->title }}</h1>
                <br>
                <div style="font-size: 30px;padding-right:29px; ">{!! Str::limit($item->detail, 150) !!}</div>
                <br>
                <button class="btn btn-lg btn-danger mr-3 " onclick="window.open('{{ route("programs.show", [$item->id, $item->slug]) }}')"
                    class="request-callback">Read More</button>
            </div>
            <!-- 4nd part -->
            @else
            
            <div class="col-lg-6 .col-md-12 col-sm-12">
                <br> <br>
                <br>
                <h1 style="color :black">{{ $item->title }}</h1>
                <br>
                <div style="font-size: 30px;padding-right:29px;">{!! Str::limit($item->detail, 150) !!}</div>
                <br>
                <button class="btn btn-lg btn-danger mr-3 " onclick="window.open('{{ route("programs.show", [$item->id, $item->slug]) }}')"
                    class="request-callback">Read More</button>
                <br>
                <br>
                <br> <br>
                <br>
                <br>
            </div>
            <div class="col-lg-6 .col-md-12 col-sm-12">
                <br> <br>
                <br>
                <img src="{{ asset($item->photo) }}" alt="" srcset="" style="height: 285px;width: 332px">
                <br>
                <br>
                <br>
            </div>
            @endif
            @endforeach
        </div>
        </section>
    </main>
@endsection