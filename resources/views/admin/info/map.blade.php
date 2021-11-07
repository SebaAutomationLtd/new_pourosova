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
                    <h5>পৌরসভার মানচিত্র</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.web.info.map.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">শিরোনাম</label>
                            <input type="text" name="title" class="form-control">
                            @error('title')
                                <span class=text-danger>{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">JPG ছবি </label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFileLang" lang="es">
                                <label class="custom-file-label" for="customFileLang">ছবি (JPG Format)</label>
                            </div>
                            @error('image')
                                <span class=text-danger>{{$message}}</span>
                            @enderror
                        </div>

                        <button class="btn btn-primary">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card main-chart mt-4 mt-md-0">
                <div class="card-header panel-tabs">
                    <h5>পৌরসভার মানচিত্রসমূহ</h5>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="table-data">
                            <table class="table table-striped table-bordered responsive nowrap table-hover"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th> ক্রমিক </th>
                                        <th>শিরোনাম</th>
                                        <th>ছবি</th>
                                        <th>একশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach($maps as $map)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$map->title ?? ''}}</td>
                                        <td>
                                            <a  href="#">
                                                <img class="rounded" src="{{ asset('img/'.$map->image ?? '') }}"
                                                alt="" style="height: 100px; width: 100px;">
                                            </a>
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
                                                        class="text-primary dropdown-item" href="{{route('admin.web.info.map.edit',$map->id ?? '')}}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a data-placement="left" title="ডিলেট করুন" data="tooltip"
                                                        class="text-danger dropdown-item" href="{{route('admin.web.info.map.delete',$map->id ?? '')}}">
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



