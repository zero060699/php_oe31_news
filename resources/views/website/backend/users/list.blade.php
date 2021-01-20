@extends('website.backend.layouts.main')
@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{ trans('message.user') }}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <div id="datatable-responsive_wrapper"class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"  cellspacing="0" role="grid" aria-describedby="datatable-responsive_info">
                                        <thead>
                                            <tr role="row" class="text-center">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First name: activate to sort column descending">
                                                    #
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First name: activate to sort column descending">
                                                    {{ trans('message.name') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive" rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.image') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.email') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.role') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.status') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.create_at') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.upddate_at') }}
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending">
                                                    {{ trans('message.Banned_until') }}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $index => $user)
                                                <tr role="row" class="text-center">
                                                    <td>{{ $index++ }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td><img class="img_user" src = "{{ asset(config('image.image').'/'.$user->image) }}"></td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->role_id }}</td>
                                                    <td>{{ $user->status }}</td>
                                                    <td>{{ $user->created_at }}</td>
                                                    <td>{{ $user->updated_at }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('users.edit', [$user->id]) }}">
                                                            <i class="glyphicon glyphicon-remove-circle"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>{{ $users->links() }}</div>
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
