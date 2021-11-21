                        @extends('admin.layout.master')
                        @section('header')
                            <section class="content-header pl-3">
                                <h1>ওয়েবসাইট</h1>
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="">
                                            <i class="fa fa-fw ti-home"></i> পৌরসভার তথ্য
                                        </a>
                                    </li>
                                    <li> শিক্ষা প্রতিষ্ঠানের তথ্য</li>

                                </ol>
                            </section>
                        @stop

                        @section('content')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card main-chart">
                                        <div class="card-header panel-tabs">
                                            <h5>শিক্ষা প্রতিষ্ঠানের তথ্য এডিট</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('admin.web.info.education.update',$education->id)}}" method="POST">
                                                @csrf
                                              <div class="form-row">
                                                <div class="form-group col-md-6 col-sm-12">
                                                    <label for="">শিক্ষা প্রতিষ্ঠানের ধরণ</label>
                                                    <input type="text" name="type" class="form-control" value="{{$education->type}}">
                                                    @error('type')
                                                        <span class=text-danger>{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-2 col-sm-4">
					                                <label for="">মোট</label>
					                                <input type="text" name="total" class="form-control" value="{{$education->total}}">
					                                @error('total')
					                                    <span class=text-danger>{{$message}}</span>
					                                @enderror
					                            </div>


					                            <div class="form-group col-md-4 col-sm-8">
					                                <label for="">প্রতিষ্ঠানের ধরণ</label>
					                                <select name="type_of_organization" id="" class="custom-select">
					                                    <option disabled selected>-- সিলেক্ট করুন --</option>
					                                    <option value="সরকারি শিক্ষা প্রতিষ্ঠান">সরকারি শিক্ষা প্রতিষ্ঠান</option>
					                                    <option value="বেসরকারি শিক্ষা প্রতিষ্ঠান">বেসরকারি শিক্ষা প্রতিষ্ঠান</option>
					                                    <option value="মাদ্রাসা">মাদ্রাসা</option>
					                                </select>
					                                @error('type_of_organization')
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


