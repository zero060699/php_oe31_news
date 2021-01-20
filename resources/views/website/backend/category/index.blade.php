@extends('website.backend.layouts.main')

@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{ trans('message.category') }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <a href="{{ route('categories.create') }}"
                                class="btn btn-success">{{ trans('message.create_category') }}</a>
                            <div id="datatable-responsive_wrapper"
                                class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
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
                                                        {{ trans('message.name') }}
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Last name: activate to sort column ascending">
                                                        {{ trans('message.action') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $item)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $item->name }}</td>
                                                        <td class="td-body d-flex">
                                                            <a class="btn btn-success"
                                                                href="{{ route('categories.edit', [$item->id]) }}">
                                                                {{ trans('message.edit') }}
                                                            </a>
                                                            <a class="btn btn-primary"
                                                                href="{{ route('categories.show', [$item->id]) }}">
                                                                {{ trans('message.children') }}
                                                            </a>
                                                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#category{{ $item->id }}">
                                                                {{ trans('message.delete') }}
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                {{ $items->links() }}
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
    @foreach ($items as $item)
        <div class="modal fade" id="category{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('message.modal_title_delete') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('categories.destroy', [$item->id]) }}"
                        method="POST" id="form{{ $item->id }}">
                            @csrf
                            @method('DELETE')
                        </form>
                        <span class="text-dark h5">{{ trans('message.want_delete') }}</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('message.close') }}</button>
                        <button form="form{{ $item->id }}" type="submit" class="btn btn-primary">{{ trans('message.confirm') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
