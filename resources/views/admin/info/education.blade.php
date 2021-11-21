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
                    <h5>শিক্ষা প্রতিষ্ঠানের তথ্য</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.web.info.education.store')}}" method="POST">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="">শিক্ষা প্রতিষ্ঠানের ধরণ</label>
                                <input type="text" required name="type" class="form-control">
                                @error('type')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-2 col-sm-4">
                                <label for="">মোট</label>
                                <input type="text" required name="total" class="form-control">
                                @error('total')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>


                            <div class="form-group col-md-4 col-sm-8">
                                <label for="">প্রতিষ্ঠানের ধরণ</label>
                                <select name="type_of_organization" required id="" class="custom-select">
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

        <div class="col-md-12 mt-4">
            <div class="card main-chart mt-4 mt-md-0">
                <div class="card-header panel-tabs">
                    <h5>শিক্ষা প্রতিষ্ঠানের তথ্য</h5>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="table-data">
                            <table class="table table-striped table-bordered responsive nowrap table-hover"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ক্রমিক</th>
                                        <th>শিক্ষা প্রতিষ্ঠানের ধরণ</th>
                                        <th>মোট</th>
                                        <th>প্রতিষ্ঠানের ধরণ</th>
                                        <th>একশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                    $no = 1;
                                    @endphp
                                    @foreach($educations as $education)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$education->type ?? ''}}</td>
                                        <td>{{$education->total ?? ''}}</td>
                                        <td>{{$education->type_of_organization ?? ''}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn  btn-outline-secondary btn-sm dropdown-toggle"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a data-placement="left" title="এডিট করুন" data="tooltip"
                                                        class="text-primary dropdown-item" href="{{route('admin.web.info.education.edit', $education->id ?? '')}}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a data-placement="left" title="ডিলেট করুন" data="tooltip"
                                                        class="text-danger dropdown-item" href="{{route('admin.web.info.education.delete', $education->id ?? '')}}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>





@stop



