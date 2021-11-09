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
        <div class="col-md-6">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>প্রকৌশল বিভাগ</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web.contact.engineer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                           <div class="">
                                <div class="form-group">
                                    <label for="">নাম</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="নাম">
                                    @error('name')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">পদবী</label>
                                    <input type="text" class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation')}}" name="designation" placeholder="পদবী">
                                    @error('designation')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">ইমেইল</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email')}}"  name="email" placeholder="ইমেইল">
                                    @error('email')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">মোবাইল নং</label>
                                    <input type="number" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact')}}"  name="contact" placeholder="মোবাইল নং">
                                    @error('contact')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">টেলিফোন</label>
                                    <input type="tel" class="form-control @error('telephone') is-invalid @enderror"  value="{{ old('telephone')}}"  name="telephone" placeholder="টেলিফোন">
                                    @error('telephone')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">300px * 300px এবং JPG ছবি </label>
                                    <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" id="customFileLang" lang="es">
                                        <label class="custom-file-label" for="customFileLang">ছবি (JPG Format, 300px *
                                            300px)</label>
                                        @error('photo')
                                            <small class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        <button class="btn btn-primary">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>প্রকৌশল বিভাগ</h5>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div>
                             <img src="{{ asset('engineer/img') }}/{{ $engineer->photo ?? ''}}" width="200"
                                alt="Photo">
                        </div>
                        <div class="h5">
                            নাম: {{ $engineer->name ?? ''}}
                        </div>
                        <div>
                            পদবী: {{ $engineer->designation ?? ''}}
                        </div>
                        <div>
                            মোবাইল: {{ $engineer->contact ?? ''}}
                        </div>
                        <div>
                            টেলিফোন: {{ $engineer->telephone ?? ''}}
                        </div>
                        <div>
                            ইমেইল: {{ $engineer->email ?? ''}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card main-chart mt-4">
        <div class="card-header panel-tabs">
            <h5>অন্যান্য কর্মকর্তা</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.web.contact.others_employee.store') }}" method="POST" >
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">নাম</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}"  name="name" placeholder="নাম">
                        @error('name')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">পদবী</label>
                        <input type="text" class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation')}}"  name="designation" placeholder="পদবী">
                        @error('designation')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">মোবাইল</label>
                        <input type="tel" class="form-control @error('contact') is-invalid @enderror"  value="{{ old('contact')}}" name="contact" placeholder="মোবাইল">
                        @error('contact')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">সাবমিট</button>
            </form>

            <div class="mt-4">
                <table class="table table-striped table-bordered responsive nowrap table-hover" id="employee"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>ক্রমিক </th>
                            <th>নাম</th>
                            <th>পদবী</th>
                            <th>মোবাইল নং</th>
                            <th>একশন</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($engineer_other_employees as $key=>$employee)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $employee->name}}</td>
                            <td>{{ $employee->designation}}</td>
                            <td>{{ $employee->contact}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn  btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="{{ route('admin.web.contact.others_employee.edit',$employee->id) }}" data-placement="left" title="এডিট করুন" data="tooltip"
                                            class="text-primary dropdown-item" href="#">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a data-placement="left" title="ডিলেট করুন" data="tooltip"
                                            class="text-danger dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee{{ $employee->id}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="delete_employee{{ $employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                    <h5 class="modal-title text-center" id="exampleModalLongTitle">Are you sure delete It!</h5>
                                    <br>
                                    <form method="post" action="{{ route('admin.web.contact.others_employee.delete',$employee->id) }}">
                                        @csrf
                                        <p class="text-center">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </p>
                                    </form>
                               
                                  </div>
                                </div>
                              </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop


