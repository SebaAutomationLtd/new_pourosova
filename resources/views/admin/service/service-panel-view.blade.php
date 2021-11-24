@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> হোমপেইজ
                </a>
            </li>
            <li> সেবাসমূহ</li>

        </ol>
    </section>
@stop

@section('content')
    <div class="row">


        <div class="col-md-12">
            <div class="card main-chart mt-4">
                <div class="card-header panel-tabs">
                    <h5 class="h5">সেবাসমূহ</h5>
                </div>
                <div style="margin-left: 1180px; margin-top: 5px;">
                    <button class="btn btn-primary"><a style="color: white;" href="{{ route('admin.web.right.service.create') }}">সেবাসমূহ এড</a></button>
                </div>
                <div class="card-body">
                    <div class="">

                        <div class="table-data">
                            <table class="table table-striped table-bordered responsive nowrap table-hover" id="sample_1"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th> ক্রমিক </th>
                                        <th data-priority="1">নাম</th>
                                        <th data-priority="2">সেবাসমূহ লিংক</th>
                                        <th data-priority="3">ছবি</th>
                                        <th>একশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @php
                                    $no = 1;
                                    @endphp
                                    @foreach($services as $service)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$service->title ?? ''}}</td>
                                        <td>{{$service->link ?? ''}}</td>
                                        <td>
                                            <img class="rounded" src="{{ asset('uploads/service/'.$service->image ?? '') }}"
                                                alt="" style="height: 80px; width: 100px;">
                                        </td>
                                    
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn  btn-outline-secondary btn-sm dropdown-toggle"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                    <a data-placement="left" title="এডিট করুন" data="tooltip"
                                                        class="text-primary dropdown-item" href="{{ route('admin.web.right.service.edit',$service->id ?? '') }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a data-placement="left" title="ডিলেট করুন" data="tooltip"
                                                        class="text-danger dropdown-item" href="{{ route('admin.web.right.service.delete',$service->id ?? '') }}">
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



