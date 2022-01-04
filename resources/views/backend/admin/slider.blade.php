@extends('backend.layouts.app')

@section('title', 'Slider')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        <h6 class="card-title">{{ __('Slider') }}</h6>
                        @if (isset($slider))
                            <form class="forms-sample" method="POST"
                                action="{{ route('admin.sliders.update', $slider->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label class="form-label">{{ __('Title') }}</label>
                                        <input type="text" class="form-control" placeholder="{{ __('Title') }}"
                                            autocomplete="off" name="title" value="{{ $slider->title }}" required="" />
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">{{ __('Photo') }} <small
                                                style="color: red">{{ __('(Photo Max Size 100px)') }}</small> </label>
                                        <br />
                                        <input type="file" name="photo" onchange="readPicture(this)"  />
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <center>
                                            <div class="card" style="margin-top: 28px">
                                                <div class="card-body">
                                                    <img src="{{ asset($slider->photo) }}" id="slider"
                                                        style="width: 100px; height: 100px">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <center>
                                            <button type="reset" class="btn btn-outline-danger">{{ __('Reset') }}</button>
                                            <button type="submit"
                                                class="btn btn-outline-primary">{{ __('Update') }}</button>
                                        </center>
                                    </div>
                                </div>
                            </form>
                        @else
                            <form class="forms-sample" method="POST" action="{{ route('admin.sliders.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label class="form-label">{{ __('Title') }}</label>
                                        <input type="text" class="form-control" placeholder="{{ __('Title') }}"
                                            autocomplete="off" name="title" value="{{ old('title') }}" required="" />
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <label class="form-label">{{ __('Photo') }} <small
                                                style="color: red">{{ __('(Photo Max Size 100px)') }}</small> </label>
                                        <br />
                                        <input type="file" name="photo" onchange="readPicture(this)" required="" />
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <center>
                                            <div class="card" style="margin-top: 28px">
                                                <div class="card-body">
                                                    <img src="//placehold.it/100x100" id="slider">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <center>
                                            <button type="reset"
                                                class="btn btn-outline-danger">{{ __('Reset') }}</button>
                                            <button type="submit"
                                                class="btn btn-outline-primary">{{ __('Save') }}</button>
                                        </center>
                                    </div>
                                </div>
                            </form>
                        @endif

                        <br />
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th width="10%">{{ __('Sl') }}</th>
                                        <th width="70%">{{ __('Title') }}</th>
                                        <th width="10%">{{ __('Photo') }}</th>
                                        <th width="10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td class="py-1">
                                                <img src="{{ asset($item->photo) }}" alt="image">
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.sliders.edit', $item->id) }}"
                                                    class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i data-feather="edit"></i></a>

                                                <a href="" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete"
                                                    onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                                                        data-feather="x-square"></i></a>
                                                <form action="{{ route('admin.sliders.destroy', [$item->id]) }}"
                                                    method="post" style="display: none;"
                                                    id="delete-form-{{ $item->id }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
                    $('#slider')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
