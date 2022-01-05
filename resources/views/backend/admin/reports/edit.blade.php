@extends('backend.layouts.app')

@section('title', 'Update Report')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        <h6 class="card-title">{{ __('Update Report') }}</h6>
                        <a class="btn btn-outline-primary float-end" href="{{ route('admin.reports.index') }}"
                            style="margin-top: -38px;">{{ __('All Report') }}</a>

                        <form class="forms-sample" method="POST" action="{{ route('admin.reports.update', $report->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Title') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Title') }}"
                                                autocomplete="off" name="title" id="title" value="{{ $report->title }}"
                                                required="" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Category') }}</label>
                                            <select class="js-example-basic-single form-select" data-width="100%"
                                                name="report_category_id" id="report_category_id" required="">
                                                <option value="">{{ __('Select Category') }}</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}" @if ($report->report_category_id == $item->id) {{ 'selected' }} @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <iframe src="http://docs.google.com/gview?url={{ asset($report->file) }}&embedded=true"  style="width:100%; height:400px;" frameborder="0"></iframe>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card" style="margin-top: 28px">
                                        <div class="card-body">
                                            <center>
                                                <img src="//placehold.it/100x100">
                                                <p class="card-text mb-3" style="color: red">
                                                    {{ __('Photo Max Size 5000 KB') }}</p>
                                                <input type="file" name="file">
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <center>
                                        <button type="reset" class="btn btn-outline-danger">{{ __('Reset') }}</button>
                                        <button type="submit" class="btn btn-outline-primary">{{ __('Update') }}</button>
                                    </center>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
