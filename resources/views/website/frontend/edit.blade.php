@extends('website.frontend.header')

@section('content')
    <div class="col-md-12 col-sm-12 alo-alo">
        <div class="x_panel create_post">
            <div class="x_title">
                <h2>{{ trans('message.edit_post') }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""
                    enctype="multipart/form-data" method="POST" action="{{ route('authors.update', $authors->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                            for="first-name">{{ trans('message.category') }}<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">

                            <select class="form-control" name="category_id">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}" name="category_id">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">{{ trans('message.title') }}</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="img_title" name="title" required="required" class="form-control "
                                placeholder="{{ trans('message.title') }}" value="{{ $authors->title }}">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">{{ trans('message.image') }}
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" class="custom-file-input" id="image" name="image" value="{{ $authors->image }}">
                            <label class="custom-file-label" for="inputGroupFile01"></label>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">{{ trans('message.content') }}
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea name="content" id="content" cols="30" rows="20" value="{!! $authors->content !!}"></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <a class="btn btn-primary" type="button"
                                href="{{ route('home.index') }}">{{ trans('message.back') }}</a>
                            <button type="submit" class="btn btn-success">{{ trans('message.submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('bower_components/components-font-awesome/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('bower_components/components-font-awesome/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('bower_components/components-font-awesome/tinymce/content.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/animated.headline.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.ticker.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('../../../unpkg.com/ionicons%405.0.0/dist/ionicons.js') }}"></script>
    <!-- UltraNews JS -->
    <script src="{{ asset('assets/js/main2.js') }}"></script>
@endsection
