@extends('backend.layouts.app')

@section('title', 'New Team')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        <h6 class="card-title">{{ __('New Team') }}</h6>
                        <a class="btn btn-outline-primary float-end" href="{{ route('admin.teams.index') }}"
                            style="margin-top: -38px;">{{ __('All Team') }}</a>

                        <form class="forms-sample" method="POST" action="{{ route('admin.teams.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">{{ __('Category') }}</label>
                                            <select class="js-example-basic-single form-select" data-width="100%"
                                                name="category" id="category" required="">
                                                <option value="Management" @if(old('category') == 'Management') {{ 'selected' }} @endif>{{ __('Management') }}</option>
                                                <option value="Advisor" @if(old('category') == 'Advisor') {{ 'selected' }} @endif>{{ __('Advisor') }}</option>
                                                <option value="Field Staff" @if(old('category') == 'Field Staff') {{ 'selected' }} @endif>{{ __('Field Staff') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">{{ __('Name') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Name') }}"
                                                autocomplete="off" name="name" id="name" value="{{ old('name') }}"
                                                required="" />
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">{{ __('Position') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Position') }}"
                                                autocomplete="off" name="position" id="position"
                                                value="{{ old('position') }}" required="" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Facebook') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Facebook') }}"
                                                autocomplete="off" name="facebook" id="facebook"
                                                value="{{ old('facebook') }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Twitter') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Twitter') }}"
                                                autocomplete="off" name="twitter" id="twitter"
                                                value="{{ old('twitter') }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Instagram') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Instagram') }}"
                                                autocomplete="off" name="instagram" id="instagram"
                                                value="{{ old('instagram') }}" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('Priority') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Priority') }}"
                                                autocomplete="off" name="priority" id="priority"
                                                value="{{ old('priority') }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label">{{ __('Detail') }}</label>
                                            <textarea id="editor" name="detail" />{{ old('detail') }}</textarea>
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
    </script>
@endsection
