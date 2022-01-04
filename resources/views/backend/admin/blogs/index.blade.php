@extends('backend.layouts.app')

@section('title', 'All Blog')
@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('All Blog') }}</h6>
                        <a class="btn btn-outline-primary float-end" href="{{ route('admin.blogs.create') }}"
                            style="margin-top: -45px;">{{ __('New Blog') }}</a>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">{{ __('Sl') }}</th>
                                        <th width="10%">{{ __('Date') }}</th>
                                        <th width="15%">{{ __('Title') }}</th>
                                        <th width="15%">{{ __('Writer') }}</th>
                                        <th width="35%">{{ __('Content') }}</th>
                                        <th width="10%">{{ __('Photo') }}</th>
                                        <th width="10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->writer }}</td>
                                            <td>{!! Str::limit($item->content, 100) !!}</td>
                                            <td class="py-1">
                                                <img src="{{ asset($item->photo) }}" alt="image">
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.blogs.edit', [$item->id]) }}"
                                                    class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i data-feather="edit"></i></a>

                                                <a href="" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete"
                                                    onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                                                        data-feather="x-square"></i></a>
                                                <form action="{{ route('admin.blogs.destroy', [$item->id]) }}"
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
