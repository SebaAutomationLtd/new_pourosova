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
                                            <h5>পৌরসভার মানচিত্রসমূহ এডিট</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('admin.web.info.map.update',$map->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                               <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="">শিরোনাম</label>
                                                    <input type="text" name="title" class="form-control" value="{{$map->title}}">
                                                    @error('title')
                                                        <span class=text-danger>{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-4">
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
					                                    <img src="{{ asset('img/'.$map->image ?? '') }}" style="height: 80px; width: 100px;">
					                                </div>
					                            </div>

                                              </div>  


                                                <button class="btn btn-primary">সাবমিট</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                              
                            </div>


                        @stop


