@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>সাধারন তথ্য</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> ড্যাশবোর্ড
                </a>
            </li>
            <li> ওয়ার্ড</li>

        </ol>
    </section>
@stop


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5 class="h5">আপডেট ওয়ার্ড</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.web.village.ward.update')}}" method="POST">
                        @csrf
                       <div class="form-row"> 
                        <div class="form-group col-md-12">
                            <label for="">নাম</label>
                            <input type="number" name="name" placeholder="নাম" required value="{{ old('name') }}" class="form-control">
                            @error('name')
                                <span class=text-danger>{{$message}}</span>
                            @enderror
                        </div>
                       </div> 
                        <button class="btn btn-primary">আপডেট</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@stop



