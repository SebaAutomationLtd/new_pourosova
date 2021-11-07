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
                    <h5>সেবাসমূহ এডিট</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web.right.service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="">নাম</label>
                                <input name="title" type="text" class="form-control" value="{{$service->title}}">
                                @error('title')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                             <div class="form-group col-md-6">
                                <label for="">সেবাসমূহ লিংক</label>
                                <input name="link" type="text" class="form-control" value="{{$service->link}}">
                                @error('link')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>
                           
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">300px * 300px এবং JPG ছবি </label>
                                <div class="custom-file">
                                    <input name="image" type="file" class="custom-file-input" id="customFileLang" lang="es">
                                    <label class="custom-file-label" for="customFileLang">ছবি (JPG Format, 300px *
                                        300px)</label> 
                                </div>
                            </div>


                            <div class="form-group col-md-2">
                                <label for="">আগের ছবি </label>
                                <div class="custom-file">
                                    <img src="{{ asset('img/'.$service->image ?? '') }}" style="height: 80px; width: 100px;">
                                </div>
                            </div>
                         </div>   
                        

                        <button class="btn btn-primary">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
            function readURL(input){
               if (input.files && input.files[0]){
                  var reader = new FileReader();
                  reader.onload = function(e){
                     $('#image')
                        .attr('src' ,e.target.result)
                           .width(150)
                           .height(80);
                  };
                  reader.readAsDataURL(input.files[0]);
               } 
            }
         </script>

@stop
