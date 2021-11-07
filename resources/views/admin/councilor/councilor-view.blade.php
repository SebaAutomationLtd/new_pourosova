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
            <div class="card main-chart mt-4">
                <div class="card-header panel-tabs">
                    <h5>কাউন্সিলর বৃন্দ</h5>
                </div>
                <div class="card-body">
                    <div class="">

                        <div class="table-data">
                            <table class="table table-striped table-bordered responsive nowrap table-hover" id="sample_1"
                                style="width:100%">
                                <thead> 
                                    <tr>
                                        <th> ক্রমিক </th>
                                        <th data-priority="2">নাম</th>
                                        <th>স্থান</th>
                                        <th data-priority="3">ওয়ার্ড </th>
                                        <th>মোবাইল নং</th>
                                        <th data-priority="1">ছবি</th>
                                        <th>কাউন্সিলরের বাণী </th>
                                        <th>একশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($male_councilors as $key=>$councilor)
                                    <tr>
                                        <td>{{ $key++ }}</td>
                                    
                                        <td>{{ $councilor->name }}</td>
                                        <td>{{ $councilor->place }}</td>
                                        <td>{{ $councilor->ward_no }}</td>
                                        <td>{{ $councilor->contact }}</td>
                                        <td>
                                            <img class="rounded" src="{{ asset('councilor/img') }}/{{$councilor->photo }}"
                                               height="60px" alt="">
                                        </td>
                                        <td>{{ $councilor->description }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn  btn-outline-secondary btn-sm dropdown-toggle"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    
                                                    <a href="{{ route('admin.web.councilor.edit',$councilor->id) }}" data-placement="left" title="এডিট করুন" data="tooltip"
                                                        class="text-primary dropdown-item" href="#">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a data-placement="left" title="ডিলেট করুন" data="tooltip"
                                                        class="text-danger dropdown-item" href="{{ route('admin.web.councilor.delete',$councilor->id) }}">
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



