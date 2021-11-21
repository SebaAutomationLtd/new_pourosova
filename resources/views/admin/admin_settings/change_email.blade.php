@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> ইমেইল পরিবর্তন 
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
                    <h5>ইমেইল পরিবর্তন</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.update_email') }}" method="POST">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="">আগের ইমেইল</label>
                                <input name="old_email" type="email" value="{{ old('old_email') }}" required class="form-control">
                                @error('old_email')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">নতুন ইমেইল</label>
                                <input name="new_email" type="email" value="{{ old('new_email') }}" required class="form-control">
                                @error('new_email')
                                <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">পাসওয়ার্ড</label>
                                <input name="password" type="password" value="" required class="form-control">
                                @error('password')
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



