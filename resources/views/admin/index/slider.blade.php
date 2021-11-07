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
                    <h5>হোম পেইজ স্লাইডার</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.index.slider') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-4 col-md-2">
                                <label for="">ছবির সিরিয়াল</label>
                                <select name="serial" id="type" class="custom-select">
                                    <option value="">-- সিলেক্ট --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>

                                @error('title')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-8 col-md-10">
                                <label for="">JPG ছবি (500px * 300px)</label>
                                <div class="custom-file">
                                    <input name="image" type="file" class="custom-file-input" id="customFileLang" lang="es">
                                    <label class="custom-file-label" for="customFileLang">ছবি (JPG Format) (500px *
                                        300px)</label>
                                </div>
                                @error('title')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-4 col-md-4">
                                <label for="title">টাইটেল</label>
                                <input class="form-control" id="title" name="title" type="text">
                                @error('title')
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
                    <h5>হোম পেইজ স্লাইডার</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @php
                        $no = 1;
                        @endphp

                        @foreach($sliders as $slider)
                        <div class="image col-md-6 mt-4">

                            <span class="image-no" style="color: blue; font-size: 25px; font-family: initial; font-weight: bold; ">{{$no++}}
                                <a data-placement="left" id="delete" title="ডিলেট করুন" data="tooltip"
                                    class="text-danger dropdown-item" href="{{ route('admin.index.slider.delete',$slider->id ?? '') }}">
                                  <i class="fa fa-trash"></i>
                                </a>
                            </span>

                            <img src="{{ asset('img/'.$slider->image ?? '') }}"  class="d-blok w-100 rounded border"
                                alt="">
                        </div>
                        @endforeach

                    </div>


                </div>
            </div>
        </div>


    </div>





@stop



