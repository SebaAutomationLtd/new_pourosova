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
                    <h5>প্রশাসন বিভাগ</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web.contact.admin.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <div class="form-group">
                                <label for="">নাম</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="নাম" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">পদবী</label>
                                <input type="text" class="form-control @error('designation') is-invalid @enderror" placeholder="পদবী" name="designation" value="{{ old('designation') }}">
                                @error('designation')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="">ইমেইল</label>
                                <input type="tel" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="ইমেইল" name="email">
                                @error('email')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="">মোবাইল নং</label>
                                <input type="tel" class="form-control @error('contact') is-invalid @enderror" placeholder="মোবাইল নং" name="contact" value="{{ old('contact') }}">
                                @error('contact')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="">টেলিফোন</label>
                                <input type="tel" class="form-control @error('telephone') is-invalid @enderror" placeholder="টেলিফোন" name="telephone" value="{{ old('telephone') }}">
                                @error('telephone')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="">300px * 300px এবং JPG ছবি </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('telephone') is-invalid @enderror" name="photo" id="customFileLang" lang="es">
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
                    <h5>প্রশাসন বিভাগ</h5>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div>
                            <img src="{{ asset('admin/img') }}/{{ $admin->photo ?? ''}}" width="200"
                                alt="Photo">
                        </div>
                        <div class="h5">
                            নাম: {{ $admin->name ?? ''}}
                        </div>
                        <div>
                            পদবী: {{ $admin->designation ?? ''}}
                        </div>
                        <div>
                            মোবাইল: {{ $admin->contact ?? ''}}
                        </div>
                        <div>
                            টেলিফোন: {{ $admin->telephone ?? ''}}
                        </div>
                        <div>
                            ইমেইল: {{ $admin->email ?? ''}}
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
            <form action="{{ route('admin.web.contact.admin.other_employee.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">নাম</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="নাম" name="name" value="{{ old('name') }}" id="name">

                    </div>
                    <div class="form-group col-md-4">
                        <label for="">পদবী</label>
                        <input type="text" class="form-control @error('designation') is-invalid @enderror" placeholder="পদবী" name="designation" value="{{ old('designation') }}" id="designation">
          
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">মোবাইল</label>
                        <input type="number" class="form-control @error('contact') is-invalid @enderror" placeholder="মোবাইল"  value="{{ old('contact') }}" name="contact">
    
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" >সাবমিট</button>
            </form>

            <div class="mt-4">
                <table class="table table-striped table-bordered responsive nowrap table-hover" id="employee"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th> ক্রমিক </th>
                            <th>নাম</th>
                            <th>পদবী</th>
                            <th>মোবাইল নং</th>
                            <th>একশন</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $key=>$employee)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->designation }}</td>
                                <td>{{ $employee->contact }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn  btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <a data-placement="left" title="এডিট করুন" data="tooltip"
                                                class="text-primary dropdown-item" href="#">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a data-placement="left" title="ডিলেট করুন" data="tooltip"
                                                class="text-danger dropdown-item" href="#">
                                                <i class="fas fa-trash-alt"></i>
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
@stop
@section('js')
<script type="text/javascript">
            document.forms['form'].elements['name'].value          =[{{ old('name') }}];
            document.forms['form'].elements['designation'].value   =[{{ old('designation') }}];
            document.forms['form'].elements['email'].value         =[{{ old('email') }}];
            document.forms['form'].elements['contact'].value       =[{{ old('contact') }}];
            document.forms['form'].elements['telephone'].value     =[{{ old('telephone') }}];
            document.forms['form'].elements['photo'].value         =[{{ old('photo') }}];
            document.forms['form'].elements['designation'].value   =[{{ old('designation') }}];
            document.forms['form'].elements['contact'].value   =    [{{ old('contact') }}];
    
</script>
@stop



