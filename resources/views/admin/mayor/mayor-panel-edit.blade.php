@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> সকল মেয়র 
                </a>
            </li>
            <li> মেয়র এডিট</li>

        </ol>
    </section>
@stop

@section('content')

	    <div class="row">
        <div class="col-md-12">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>মেয়র এডিট</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web.mayor.update', $mayor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="">নাম</label>
                                <input name="name" type="text" class="form-control" value="{{$mayor->name}}">
                                @error('name')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">স্থান</label>
                                <input name="place" type="text" class="form-control" value="{{$mayor->place}}">
                                @error('place')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-3">
                                <label for="">মোবাইল নং</label>
                                <input name="mobile" type="tel" class="form-control" value="{{$mayor->mobile}}">
                                @error('mobile')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">মেয়রের ক্রম</label>
                                <select name="serial" id="" class="custom-select">
                                    <option>-- কত তম মেয়র সিলেক্ট করুন --</option>
                                    <option>প্রথম</option>
                                    <option>দ্বিতীয়</option>
                                    <option>তৃতীয়</option>
                                    <option>চতুর্থ</option>
                                    <option>পঞ্চম</option>
                                    <option>ষষ্ঠ</option>
                                    <option>সপ্তম</option>
                                    <option>অষ্টম</option>
                                    <option>নবম</option>
                                    <option>দশম</option>
                                    <option>একাদশ</option>
                                    <option>দ্বাদশ</option>
                                </select>

                                @error('serial')
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
                                    <img src="{{ asset('uploads/mayor/'.$mayor->image ?? '') }}" style="height: 80px; width: 100px;">
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
