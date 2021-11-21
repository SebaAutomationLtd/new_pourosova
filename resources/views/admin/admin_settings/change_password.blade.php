@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> পাসওয়ার্ড  পরিবর্তন 
                </a>
            </li>
           

        </ol>
    </section>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>পাসওয়ার্ড পরিবর্তন</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.update_password') }}" method="POST">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="">আগের পাসওয়ার্ড</label>
                                <input name="old_password" type="password" value="{{ old('old_password') }}" required class="form-control" placeholder="আগের পাসওয়ার্ড">
                                @error('old_password')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">নতুন পাসওয়ার্ড</label>
                                <input name="new_password" type="password" value="{{ old('password') }}" required class="form-control" placeholder="নতুন পাসওয়ার্ড">
                                @error('password')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">পাসওয়ার্ড নিশ্চিত করুন</label>
                                <input name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" required class="form-control" placeholder="পাসওয়ার্ড নিশ্চিত করুন">
                                @error('password_confirmation')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                          </div>





                        <button class="btn btn-primary">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>



    </div>





@stop



