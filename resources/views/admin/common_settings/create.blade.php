@extends('admin.layout.master')

@section('header')
    <section class="content-header pl-3">
        <h1>সাধারন তথ্য</h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-fw ti-home"></i> ড্যাশবোর্ড
            </li>
            <li>সাধারন তথ্য</li>
        </ol>
    </section>
@stop

@section('content')

    <div class="content-wrapper">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="">সাধারন তথ্য নিবন্ধন করুন</h3>
            </div>
            <div class="card-body">
                <form class="needs-validation" action="{{ route('common-settings.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <label for="" class="col-form-label">পৌরসভার নাম (বাংলা)</label>
                            <input type="text" class="form-control mr-3 @error('pourosova_name_bn') is-invalid @enderror"
                                   name="pourosova_name_bn" placeholder="পৌরসভার নাম (বাংলা)" value="{{ @$data->pourosova_name_bn }}">

                            @error('pourosova_name_bn')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <label for="" class="col-form-label">পৌরসভার নাম (ইংরেজী)</label>
                            <input type="text" class="form-control mr-3 @error('pourosova_name_en') is-invalid @enderror"
                                   name="pourosova_name_en" placeholder="পৌরসভার নাম (ইংরেজী)" value="{{ @$data->pourosova_name_en }}">

                            @error('pourosova_name_en')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <label for="" class="col-form-label">পৌরসভার ঠিকানা</label>
                            <input type="text" class="form-control mr-3 @error('pourosova_address') is-invalid @enderror"
                                   name="pourosova_address" placeholder="ঠিকানা" value="{{ @$data->pourosova_address }}">

                            @error('pourosova_address')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <label for="" class="col-form-label">মেয়রের নাম</label>
                            <input type="text" class="form-control mr-3 @error('mayor_name') is-invalid @enderror"
                                   name="mayor_name" placeholder="মেয়রের নাম" value="{{ @$data->mayor_name }}">

                            @error('mayor_name')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <label for="" class="col-form-label">ওয়েব ইউআরএল</label>
                            <input type="url" class="form-control mr-3 @error('web_url') is-invalid @enderror"
                                   name="web_url" placeholder="ওয়েব ইউআরএল" value="{{ @$data->web_url }}">

                            @error('web_url')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary save_data mt-3">সংরক্ষণ</button>

                </form>
            </div>
        </div>
    </div>


@endsection
