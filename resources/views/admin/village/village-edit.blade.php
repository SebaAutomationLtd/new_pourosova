                        @extends('admin.layout.master')
                        @section('header')
                        <section class="content-header pl-3">
                            <h1>সাধারন তথ্য</h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="">
                                        <i class="fa fa-fw ti-home"></i> ড্যাশবোর্ড
                                    </a>
                                </li>
                                <li> গ্রাম</li>

                            </ol>
                        </section>
                        @stop

                        @section('content')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card main-chart">
                                    <div class="card-header panel-tabs">
                                        <h5 class="h5">গ্রাম এডিট</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('admin.web.village.village.update',$village->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="">শিরোনাম</label>
                                                    <input type="text" name="name" class="form-control" value="{{$village->name}}">
                                                    @error('name')
                                                    <span class=text-danger>{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                  <label for="">ওয়ার্ড নং</label>
                                                  <select name="ward_id" required id="" class="custom-select">
                                                      <option disabled selected>-- সিলেক্ট করুন --</option>
                                                      @foreach($words as $word)
                                                      <option value="{{$word->id}}" {{$word->id == $village->ward_id ? "selected":""}}> {{$word->ward_no}}</option>
                                                      @endforeach
                                                  </select>
                                                  @error('ward_id')
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


