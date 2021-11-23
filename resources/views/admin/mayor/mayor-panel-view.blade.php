@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> সকল মেয়র 
                </a>
            </li>
            <li> বর্তমান ও সাবেক মেয়র বৃন্দ</li>

        </ol>
    </section>
@stop

@section('content')
    <div class="row">


        <div class="col-md-12">
            <div class="card main-chart mt-4">
                <div class="card-header panel-tabs">
                    <h5 class="h5">বর্তমান ও সাবেক মেয়র বৃন্দ</h5>
                </div>
                <div class="card-body">
                    <div class="">

                        <div class="table-data">
                            <table class="table table-striped table-bordered responsive nowrap table-hover" id="sample_1"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th> ক্রমিক </th>
                                        <th data-priority="1">ছবি</th>
                                        <th data-priority="2">নাম</th>
                                        <th data-priority="3">পজিশন</th>
                                        <th>মোবাইল নং</th>
                                        <th>একশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach($mayors as $mayor)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>
                                            <img class="rounded" src="{{ asset('uploads/mayor/'.$mayor->image ?? '') }}"
                                                alt="" style="height: 100px; width: 100px;">
                                        </td>
                                        <td>{{$mayor->name ?? ''}}</td>
                                        <td>{{$mayor->serial ?? ''}}</td>
                                        <td>{{$mayor->mobile ?? ''}}</td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn  btn-outline-secondary btn-sm dropdown-toggle"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                    <a data-placement="left" title="এডিট করুন" data="tooltip"
                                                        class="text-primary dropdown-item" href="{{ route('admin.web.mayor.edit',$mayor->id ?? '') }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a data-placement="left" title="ডিলেট করুন" data="tooltip"
                                                        class="text-danger dropdown-item" href="{{ route('admin.web.mayor.delete',$mayor->id ?? '') }}">
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



