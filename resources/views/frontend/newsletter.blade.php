@extends('layouts.app')

@section('title', 'Newsletter')
@section('bannertext', 'Newsletter')
@section('content')
    <main>
        <section>
            <div class="container">
                <br>
                @foreach ($news as $item)
                    <u class="">
                        <p style="font-size: 17px;"><a href="{{ asset($item->file) }}"> {{ $item->title }} </a></p>
                    </u>
                @endforeach
            </div>
        </section>
    </main>
@endsection
