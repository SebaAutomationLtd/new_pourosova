@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="fa fa-fw ti-home"></i> হেডার
                </a>
            </li>
            <li> লোগো</li>

        </ol>
    </section>
@stop


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>ওয়ার্ড</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.web.village.ward.store')}}" method="POST">
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
                        <button class="btn btn-primary">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card main-chart mt-4 mt-md-0">
                <div class="card-header panel-tabs">
                    <h5>ওয়ার্ড</h5>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="table-data">
                            <table class="table table-striped table-bordered responsive nowrap table-hover"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th> ক্রমিক </th>
                                        <th>ওয়ার্ড নং</th>
                                        <th>একশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($wards as $key=>$ward)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>ওয়ার্ড {{ $ward->ward_no}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn  btn-outline-secondary btn-sm dropdown-toggle"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a href="{{ route('admin.web.village.ward.edit',$ward->id) }}" data-placement="left" title="এডিট করুন" data="tooltip"
                                                        class="text-primary dropdown-item" href="">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a data-placement="left" title="ডিলেট করুন" data="tooltip"
                                                        class="text-danger dropdown-item" href="">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                          
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>



@stop



