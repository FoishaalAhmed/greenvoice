@extends('backend.layouts.app')

@section('title', 'Contact')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        <h6 class="card-title">{{ __('Contact') }}</h6>
                        <form class="forms-sample" method="POST"
                            action="{{ route('admin.contacts.update', $contact->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('E-mail') }}</label>
                                    <input type="email" class="form-control" placeholder="{{ __('E-mail') }}"
                                        autocomplete="off" name="email" value="{{ $contact->email }}" required="" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Phone') }}</label>
                                    <input type="text" class="form-control" placeholder="{{ __('Phone') }}"
                                        autocomplete="off" name="phone" value="{{ $contact->phone }}" required="" />
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Facebook') }}</label>
                                    <input type="text" class="form-control" placeholder="{{ __('Facebook') }}"
                                        autocomplete="off" name="facebook" value="{{ $contact->facebook }}" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Twitter') }}</label>
                                    <input type="text" class="form-control" placeholder="{{ __('Twitter') }}"
                                        autocomplete="off" name="twitter" value="{{ $contact->twitter }}" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Instagram') }}</label>
                                    <input type="text" class="form-control" placeholder="{{ __('Instagram') }}"
                                        autocomplete="off" name="instagram" value="{{ $contact->instagram }}" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('Pinterest') }}</label>
                                    <input type="text" class="form-control" placeholder="{{ __('Pinterest') }}"
                                        autocomplete="off" name="pinterest" value="{{ $contact->pinterest }}" />
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label">{{ __('Address') }}</label>
                                    <textarea class="form-control" placeholder="{{ __('Address') }}" autocomplete="off"
                                        name="address" rows="5" />{{ $contact->address }}</textarea>
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
