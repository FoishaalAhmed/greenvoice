@extends('backend.layouts.app')

@section('title', 'New Blog')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        <h6 class="card-title">{{ __('New Blog') }}</h6>
                        <a class="btn btn-outline-primary float-end" href="{{ route('admin.blogs.index') }}"
                            style="margin-top: -38px;">{{ __('All Blog') }}</a>

                        <form class="forms-sample" method="POST" action="{{ route('admin.blogs.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Date') }}</label>
                                            <input type="text" class="form-control date datepicker" placeholder="{{ __('Date') }}"
                                                autocomplete="off" name="date" id="datePickerExample" value="{{ old('date') }}"
                                                required="" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Title') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Title') }}"
                                                autocomplete="off" name="title" id="title" value="{{ old('title') }}"
                                                required="" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Slug') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Slug') }}"
                                                autocomplete="off" name="slug" id="slug" value="{{ old('slug') }}"
                                                required="" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Writer') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Writer') }}"
                                                autocomplete="off" name="writer" id="writer" value="{{ old('writer') }}"
                                                 />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label">{{ __('Content') }}</label>
                                            <textarea id="editor" name="content" />{{ old('content') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card" style="margin-top: 28px">
                                        <div class="card-body">
                                            <center>
                                                <img src="//placehold.it/100x100" id="user-photo">
                                                <p class="card-text mb-3" style="color: red">
                                                    {{ __('Photo Max Size 100px') }}</p>
                                                <input type="file" name="photo" onchange="readPicture(this)">
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <center>
                                        <button type="reset" class="btn btn-outline-danger">{{ __('Reset') }}</button>
                                        <button type="submit" class="btn btn-outline-primary">{{ __('Save') }}</button>
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

@section('footer')
    <script>
        function readPicture(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#user-photo')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(function() {
            CKEDITOR.replace('editor')
        });

        $("#title").keyup(function() {
            var title = $("#title").val();
            var slug = (title.replace(/[^a-zA-Z0-9]+/g, '-')).toLowerCase();
            $("#slug").val(slug);
        });
    </script>
@endsection
