@extends('backend.layouts.app')

@section('title', 'All Team')
@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('All Team') }}</h6>
                        <a class="btn btn-outline-primary float-end" href="{{ route('admin.teams.create') }}"
                            style="margin-top: -45px;">{{ __('New Team') }}</a>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">{{ __('Sl') }}</th>
                                        <th width="15%">{{ __('Category') }}</th>
                                        <th width="25%">{{ __('Name') }}</th>
                                        <th width="25%">{{ __('Position') }}</th>
                                        <th width="10%">{{ __('Priority') }}</th>
                                        <th width="10%">{{ __('Photo') }}</th>
                                        <th width="10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teams as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->category }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->position }}</td>
                                            <td>{{ $item->priority }}</td>
                                            <td class="py-1">
                                                <img src="{{ asset($item->photo) }}" alt="image">
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.teams.edit', [$item->id]) }}"
                                                    class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i data-feather="edit"></i></a>

                                                <a href="" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete"
                                                    onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                                                        data-feather="x-square"></i></a>
                                                <form action="{{ route('admin.teams.destroy', [$item->id]) }}"
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
