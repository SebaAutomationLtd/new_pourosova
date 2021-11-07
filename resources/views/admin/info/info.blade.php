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
                                            <h5>পৌরসভার তথ্য</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('admin.web.info.info.store')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="">শিরোনাম</label>
                                                    <input type="text" name="title" class="form-control" placeholder="">
                                                    @error('title')
                                                        <span class=text-danger>{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="">বর্ণনা</label>
                                                    <textarea rows="4" cols="50" name="description" type="text" class="form-control" ></textarea>
                                                    @error('title')
                                                        <span class=text-danger>{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <button class="btn btn-primary">সাবমিট</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="card main-chart mt-4">
                                        <div class="card-header panel-tabs">
                                            <h5>পেইজের তথ্যসমূহ</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="">

                                                <div class="table-data">
                                                    <table
                                                        class="table table-striped table-bordered responsive nowrap table-hover"
                                                        id="alldata" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th> ক্রমিক </th>
                                                                <th data-priority="1">শিরোনাম</th>
                                                                <th data-priority="2">বর্ণনা</th>
                                                                <th>একশন</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @php
                                                            $no = 1;
                                                            @endphp

                                                            @foreach($infos as $info)
                                                            <tr>
                                                                <td>{{$no++}}</td>
                                                                <td>{{$info->title ?? ''}}</td>
                                                                <td>{{$info->description ?? ''}}</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button
                                                                            class="btn  btn-outline-secondary btn-sm dropdown-toggle"
                                                                            type="button" id="dropdownMenuButton"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu"
                                                                            aria-labelledby="dropdownMenuButton">

                                                                            <a data-placement="left" title="এডিট করুন"
                                                                                data="tooltip"
                                                                                class="text-primary dropdown-item" href="{{route('admin.web.info.info.edit', $info->id ?? '')}}">
                                                                                <i class="fa fa-pencil"></i>
                                                                            </a>
                                                                            <a data-placement="left" title="ডিলেট করুন"
                                                                                data="tooltip"
                                                                                class="text-danger dropdown-item" href="{{route('admin.web.info.info.delete', $info->id ?? '')}}">
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


