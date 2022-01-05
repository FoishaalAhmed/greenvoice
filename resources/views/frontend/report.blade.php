@extends('layouts.app')

@section('title', 'Report')
@section('bannertext', 'Report')
@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row mb-3 d-lg-flex">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        @foreach ($reports as $item)


                            <h3>{{ $item->name }}</h3>
                            <div class="linkk">
                                @foreach ($item->reports as $report)
                                
                                &bull;<u><a class="p-3" href="{{ asset($report->file) }}"> {{ $report->title }} </a></u><br> 
                                @endforeach
                            </div>

                            <br>
                        @endforeach

                    </div>

                    <div class="col-lg-7">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
