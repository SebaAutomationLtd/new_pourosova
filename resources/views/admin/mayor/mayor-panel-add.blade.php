@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i>  সকল মেয়র 
                </a>
            </li>
            <li> বর্তমান ও সাবেক মেয়র</li>

        </ol>
    </section>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>বর্তমান ও সাবেক মেয়র</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web.mayor.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="">নাম</label>
                                <input name="name" type="text" required value="{{ old('name') }}" class="form-control" placeholder="">
                                @error('name')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">স্থান</label>
                                <input name="place" type="text" required value="{{ old('place') }}" class="form-control" placeholder="">
                                @error('place')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-3">
                                <label for="">মোবাইল নং</label>
                                <input name="mobile" type="tel" required value="{{ old('mobile') }}" class="form-control" placeholder="">
                                @error('mobile')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">মেয়রের ক্রম</label>
                                <select name="serial" id="" required class="custom-select">
                                    <option disabled selected>-- কত তম মেয়র সিলেক্ট করুন --</option>
                                    <option value="প্রথম">প্রথম</option>
                                    <option value="দ্বিতীয়">দ্বিতীয়</option>
                                    <option value="তৃতীয়">তৃতীয়</option>
                                    <option value="চতুর্থ">চতুর্থ</option>
                                    <option value="পঞ্চম">পঞ্চম</option>
                                    <option value="ষষ্ঠ">ষষ্ঠ</option>
                                    <option value="সপ্তম">সপ্তম</option>
                                    <option value="অষ্টম">অষ্টম</option>
                                    <option value="নবম">নবম</option>
                                    <option value="দশম">দশম</option>
                                    <option value="একাদশ">একাদশ</option>
                                    <option value="দ্বাদশ">দ্বাদশ</option>
                                </select>

                                @error('serial')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">300px * 300px এবং JPG ছবি </label>
                                <div class="custom-file">
                                    <input name="image" required type="file" class="custom-file-input" id="customFileLang" lang="es">
                                    <label class="custom-file-label" for="customFileLang">ছবি (JPG Format, 300px *
                                        300px)</label>
                                    @error('image')
                                      <span class=text-danger>{{$message}}</span>
                                    @enderror    
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



