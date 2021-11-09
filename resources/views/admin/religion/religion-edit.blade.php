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
                                            <h5>ধর্ম এডিট</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('admin.web.religion.religion.update',$religion->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                               <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="">নাম</label>
                                                    <input type="text" name="name" class="form-control" value="{{$religion->name}}">
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


                              
                            </div>


                        @stop


