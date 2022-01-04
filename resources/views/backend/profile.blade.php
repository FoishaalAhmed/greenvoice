@extends('backend.layouts.app')
@section('title', 'Profile')
@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">{{ __('Profile') }}</li>
                
            </ol>
        </nav>

        <div class="row">
            @include('includes.error')
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('Update User Photo') }}</h4>
                        <form class="cmxform" id="signupForm" method="post" enctype="multipart/form-data" action="{{ route('profile.photo') }}">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <center>
                                        <h6 class="card-title">{{ auth()->user()->name }}</h6>
                                        <img src="{{ asset(auth()->user()->photo) }}" style="width: 100px; height: 100px;"
                                            alt="{{ auth()->user()->name }}" id="profile-photo">
                                        <br />
                                        <p style="color: red">{{ __('Photo Max Size 100px') }}</p>
                                        <input type="file" name="photo" onchange="readPicture(this)"/>

                                    </center>
                                </div>
                                <div class="card-footer">
                                    <center>
                                        <button type="submit" class="btn btn-outline-success">{{ __('Update') }}</button>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('Update User Password') }}</h4>
                        <form class="cmxform" id="signupForm" method="post"
                            action="{{ route('profile.password') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="oldPassword" class="col-form-label">{{ __('Old Password') }}</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" maxlength="20" name="old_password" id="oldPassword"
                                        type="password" placeholder="{{ __('Old Password') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="newPassword" class="col-form-label">{{ __('New Password') }}</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" maxlength="20" name="password" id="newPassword"
                                        type="password" placeholder="{{ __('New Password') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="confirmPassword"
                                        class="col-form-label">{{ __('Confirm Password') }}</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" maxlength="20" name="password_confirmation"
                                        id="confirmPassword" type="password" placeholder="{{ __('Retype New Password') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">

                                </div>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-outline-success">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ __('Update User Password') }}</h4>
                        <form class="cmxform" id="signupForm" method="post" action="{{ route('profile.info') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" name="name" id="name" type="text"
                                        placeholder="{{ __('Name') }}" value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="email" class="col-form-label">{{ __('E-mail Address') }}</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" name="email" id="email" type="email"
                                        placeholder="{{ __('E-mail Address') }}" value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="phone" class="col-form-label">{{ __('Phone') }}</label>
                                </div>
                                <div class="col-lg-8">
                                    <input class="form-control" name="phone" id="phone" type="text"
                                        placeholder="{{ __('Phone') }}" value="{{ auth()->user()->phone }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">
                                    <label for="address" class="col-form-label">{{ __('Address') }}</label>
                                </div>
                                <div class="col-lg-8">
                                    <textarea class="form-control" name="address" id="address"
                                        rows="5">{{ auth()->user()->address }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-3">

                                </div>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-outline-success">{{ __('Update') }}</button>
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
                    $('#profile-photo')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
