@extends('website.backend.layouts.main')

@section('content')
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>{{ trans('message.update_user') }}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""  enctype="multipart/form-data" method="POST" action="{{ route('users.update', [$users->id]) }}">
                @csrf
                @method('PUT')
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">{{ trans('message.name') }}<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="name" required="required" class="form-control " name="name" value="{{ $users->name }}">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">{{ trans('message.banned_at') }}<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="date" id="status" required="required" class="form-control " name="banned_until" value="{{ $users->banned_until }}">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">{{ trans('message.email') }}<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="email" id="email" required="required" class="form-control " name="email" value="{{ $users->email }}">
                    </div>
                </div>

                  <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">{{ trans('message.Image_upload') }}
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                          <input type="file" id="image" name="image" value="{{ $users->image }}">
                      </div>
                  </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="glyphicon glyphicon-remove" href="{{ route('users.index') }}"></button>
                        <button type="submit" class="glyphicon glyphicon-ok"></button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
