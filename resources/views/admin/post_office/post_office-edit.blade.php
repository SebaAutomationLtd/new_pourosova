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
            <li> পোস্ট অফিস</li>

        </ol>
    </section>
@stop

                        @section('content')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card main-chart">
                                        <div class="card-header panel-tabs">
                                            <h5 class="h5">পোস্ট অফিস এডিট</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('admin.web.village.post_office.update',$post_office->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                               <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="">নাম</label>
                                                    <input type="text" name="name" class="form-control" value="{{$post_office->name}}">
                                                    @error('name')
                                                        <span class=text-danger>{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
						                            <label for="">পোস্ট কোড</label>
						                            <input type="text" name="code" class="form-control" value="{{$post_office->code}}">
						                            @error('code')
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


