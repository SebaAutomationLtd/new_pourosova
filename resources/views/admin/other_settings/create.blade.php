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
                <h3 class="h5">নতুন তথ্য নিবন্ধন করুন</h3>
            </div>
            <div class="card-body">
                <form class="needs-validation" action="{{ route('other-settings', $slug) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <label for="inputName" class="col-form-label">তথ্যের নাম</label>
                            <div class="d-flex">
                                <input type="text" class="form-control mr-3 @error('name') is-invalid @enderror"
                                       name="name"
                                       placeholder="{{ $title }} Name" required value="{{ old('name') }}">
                                <button type="submit" class="btn btn-primary save_data">সংরক্ষণ</button>
                            </div>


                            @error('name')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
