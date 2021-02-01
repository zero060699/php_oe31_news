@extends('website.backend.layouts.main')

@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{ trans('message.request_post') }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div id="datatable-responsive_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div id="datatable-responsive_filter" class="dataTables_filter">
                                            <label>{{ trans('message.search') }}
                                                <input type="search" class="form-control input-sm" placeholder=""
                                                    aria-controls="datatable-responsive">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                            cellspacing="0" width="100%" role="grid"
                                            aria-describedby="datatable-responsive_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="First name: activate to sort column descending">
                                                        {{ trans('message.stt') }}
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="First name: activate to sort column descending">
                                                        {{ trans('message.user') }}
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-responsive" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="First name: activate to sort column descending">
                                                        {{ trans('message.role') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.status') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.created_at') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.action') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            @php
                                                $index = config('number_status_post.status_request');
                                            @endphp
                                            <tbody>
                                                @foreach ($requestWriter as $item)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $index++ }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->role->name }}</td>
                                                        <td>{{ $item->status }}</td>
                                                        <td>{{  date('M d ,Y', strtotime($item->created_at))}} {{ trans('message.at')}} {{ date('g:ia', strtotime($item->created_at)) }}</td>
                                                        <td class="d-flex">
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#post{{ $item->id }}">
                                                                {{ trans('message.block') }}
                                                            </button>
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
            </div>
        </div>
    </div>
    @foreach ($requestWriter as $item)
        <div class="modal fade" id="post{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('authors.update', [$item->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{ config('number_status_post.user') }}" name="role_id">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ trans('message.block') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ trans('message.want_block') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('message.close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ trans('message.reject') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
@endsection
