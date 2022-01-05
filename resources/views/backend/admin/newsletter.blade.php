@extends('backend.layouts.app')

@section('title', 'Newletter')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        <h6 class="card-title">{{ __('Newletter') }}</h6>
                        @if (!isset($newsletter))

                            <form class="forms-sample" method="POST" action="{{ route('admin.newsletters.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row mb-3">
                                            <label class="form-label">{{ __('Title') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Title') }}"
                                                autocomplete="off" name="title" id="title" value="{{ old('title') }}"
                                                required="" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card" style="margin-top: 28px">
                                            <div class="card-body">
                                                <center>
                                                    <img src="//placehold.it/100x100">
                                                    <p class="card-text mb-3" style="color: red">
                                                        {{ __('File Max Size 5000 KB') }}</p>
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
                                            <button type="submit"
                                                class="btn btn-outline-primary">{{ __('Save') }}</button>
                                        </center>
                                    </div>
                                </div>
                            </form>

                        @else

                            <form class="forms-sample" method="POST"
                                action="{{ route('admin.newsletters.update', $newsletter->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row mb-3">
                                            <label class="form-label">{{ __('Title') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Title') }}"
                                                autocomplete="off" name="title" id="title"
                                                value="{{ $newsletter->title }}" required="" />
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <iframe
                                                    src="http://docs.google.com/gview?url={{ asset($newsletter->file) }}&embedded=true"
                                                    style="width:100%; height:400px;" frameborder="0"></iframe>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card" style="margin-top: 28px">
                                            <div class="card-body">
                                                <center>
                                                    <img src="//placehold.it/100x100">
                                                    <p class="card-text mb-3" style="color: red">
                                                        {{ __('File Max Size 5000 KB') }}</p>
                                                    <input type="file" name="file">
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <center>
                                            <button type="reset"
                                                class="btn btn-outline-danger">{{ __('Reset') }}</button>
                                            <button type="submit"
                                                class="btn btn-outline-primary">{{ __('Update') }}</button>
                                        </center>
                                    </div>
                                </div>
                            </form>

                        @endif

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th width="10%">{{ __('Sl') }}</th>
                                        <th width="60%">{{ __('Title') }}</th>
                                        <th width="20%">{{ __('File') }}</th>
                                        <th width="10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td><a href="{{ asset($item->file) }}"><i class="link-icon"
                                                        data-feather="download"></i></a></td>
                                            <td>
                                                <a href="{{ route('admin.newsletters.edit', [$item->id]) }}"
                                                    class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i data-feather="edit"></i></a>

                                                <a href="" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete"
                                                    onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                                                        data-feather="x-square"></i></a>
                                                <form action="{{ route('admin.newsletters.destroy', [$item->id]) }}"
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
