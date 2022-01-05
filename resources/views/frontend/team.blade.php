@extends('layouts.app')

@section('title', 'Team')
@section('bannertext', 'Team')
@section('content')
    <main>
        <section>
            <div class="container">
                <div class=" row mb-3 d-lg-flex ">
                    @foreach ($teams as $item)
                        <div class=" col-lg-3 col-md-6 col-sm-12 d-lg-flex " style="height: 400px; width:350px;">

                            <div class="card p-5 mb-5 m-lg-0  ">
                                <img class="card-img-top " src="{{ asset($item->photo) }}" alt=" ">

                                <div class="card-body">
                                    <h5 class=" card-title font-weight-bolder text-center">{{ $item->name }}</h5>
                                    <p class="text-center ">{{ $item->position }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
