@extends('layouts.app')

@section('title', 'About')
@section('bannertext', 'About')
@section('content')
    <main>
        <section>
            <div class="container">
                @if ($about)


                    <div style="font-size:17px; text-align: justify;">{!! $about->content !!}</div>
                @endif
                @if ($mission)

                    <h3>Our Mission</h3> <br>

                    <div style="font-size:17px"> {!! $mission->content !!} </div>
                    <br>
                @endif
                @if ($value)

                    <h3>Our Values</h3>

                    <div class="Values p-4">

                        {!! $value->content !!}
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection
