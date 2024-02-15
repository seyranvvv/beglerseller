@extends('admin.layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h4 mb-0">
            <a href="{{ route('admin.greet.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transAdmin.partners')
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.create')
        </div>
    </div>

    <div class="my-4">
        <form action="{{ route('admin.greet.store') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}


            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-lg-4 col-md-4 col-form-label text-md-right">@lang('transFront.type')</label>
                <select name="type" required class="form-control col-lg-4 col-md-8" id="exampleFormControlSelect1">
                    <option value="top">Hyzmatdashlar</option>
                    <option value="bottom">Dashary yurt kompaniyalar</option>
                </select>
            </div>
            <div class="form-group row">
                <label for="name" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.name') <span class="text-danger">*</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <input id="name" type="text"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                           value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <hr>

            <div class="form-group row">
                <label for="image" class="col-lg-4 col-md-4 col-form-label text-md-right">
                    @lang('transAdmin.image') <span class="text-secondary">(167x80)</span>
                </label>
                <div class="col-lg-4 col-md-8">
                    <div class="mb-3">
                        <img src="{{ asset('img/temp/category.png') }}" alt="@lang('transAdmin.not-found')"
                             class="img-fluid image_upload img-max border">
                    </div>
                    <div class="custom-file">
                        <input id="image" type="file"
                               class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : '' }}"
                               name="image" accept="image/*" onChange="imageUpload(this);">
                        <label class="custom-file-label" for="image">. . .</label>
                    </div>
                    @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                    @endif
                    <script>
                        function imageUpload(input) {
                            if (input.files && input.files[0]) {
                                var label = input.files[0].name;
                                $('#image').next('label').text(label);
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $('.image_upload').attr('src', e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
            </div>


            {{--submit button--}}
            <div class="form-group row mb-0">
                <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> @lang('transAdmin.save')
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
