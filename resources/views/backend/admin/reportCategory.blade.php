@extends('backend.layouts.app')

@section('title', 'Category')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        <h6 class="card-title">{{ __('Category') }}</h6>
                        <a class="btn btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#create" href=""
                            style="margin-top: -45px;">{{ __('New Category') }}</a>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th width="10%">{{ __('Sl') }}</th>
                                        <th width="80%">{{ __('Name') }}</th>
                                        <th width="10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                    data-bs-target="#edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Edit" data-id="{{ $item->id }}" data-name="{{ $item->name }}" ><i data-feather="edit"></i></a>

                                                <a href="" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete"
                                                    onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                                                        data-feather="x-square"></i></a>
                                                <form action="{{ route('admin.report-categories.destroy', [$item->id]) }}"
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

                        <div class="modal fade bd-example-modal-xl" tabindex="-1" aria-labelledby="myExtraLargeModalLabel"
                            aria-hidden="true" id="create">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title h4" id="myExtraLargeModalLabel">{{ __('New Category') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" method="POST"
                                            action="{{ route('admin.report-categories.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <label class="form-label">{{ __('Name') }}</label>
                                                <input type="text" class="form-control" placeholder="{{ __('Name') }}" autocomplete="off" name="name" value="{{ old('name') }}"
                                                    required="" />
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade bd-example-modal-xl" tabindex="-1" aria-labelledby="myExtraLargeModalLabel"
                            aria-hidden="true" id="edit">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title h4" id="myExtraLargeModalLabel">{{ __('Update Category') }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" method="POST" action="#" enctype="multipart/form-data"
                                            id="edit-form">
                                            @csrf
                                            @method('PUT')
                                            <div class="row mb-3">
                                                <label class="form-label">{{ __('Name') }}</label>
                                                <input type="text" class="form-control" placeholder="{{ __('Name') }}"
                                                    autocomplete="off" name="name" value="{{ old('name') }}" required=""
                                                    id="name" />
                                                <input type="hidden" name="id" id="id">
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
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $('#edit').on("show.bs.modal", function(event) {
            let e = $(event.relatedTarget);
            let id = e.data('id');
            let name = e.data('name');
            let action = '{{ URL::to('admin/report-categories/update') }}';
            
            $("#edit-form").attr('action', action);
            $("#id").val(id);
            $("#name").val(name);
        });
    </script>
@endsection
