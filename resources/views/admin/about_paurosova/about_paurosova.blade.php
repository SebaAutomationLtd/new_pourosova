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
                    <h5>পৌরসভার সম্পর্কে</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web.right.about_paurosova.update' , $about_puaro->id) }}" method="POST">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="">নাম</label>
                                <input name="title" type="text" class="form-control" value="{{$about_puaro->title ?? '' }}">
                                @error('title')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>
                         </div>   
                            
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="">বিস্তারিত</label>
                                <textarea rows="4" cols="50" name="description" type="text" class="form-control"> {{$about_puaro->description ?? ''}}
                                </textarea>  
                                @error('description')
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



