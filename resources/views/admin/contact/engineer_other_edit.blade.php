@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> জরুরী যোগাযোগ
                </a>
            </li>
            <li> অন্যান্য কর্মকর্তা</li>

        </ol>
    </section>
@stop

@section('content')
    <div class="row">
      
	    <div class="card main-chart mt-4">
	        <div class="card-header panel-tabs">
	            <h5>আপডেট অন্যান্য কর্মকর্তা</h5>
	        </div>
	        <div class="card-body">
	            <form action="{{ route('admin.web.contact.others_employee.update',$other_employee_edit->id) }}" method="POST" >
	                @csrf
	                <div class="row">
	                    <div class="form-group col-md-4">
	                        <label for="">নাম</label>
	                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $other_employee_edit->name}}"  name="name" placeholder="নাম" required>
	                        @error('name')
	                            <small class="text-danger">
	                                <strong>{{ $message }}</strong>
	                            </small>
	                        @enderror
	                    </div>
	                    <div class="form-group col-md-4">
	                        <label for="">পদবী</label>
	                        <input type="text" class="form-control @error('designation') is-invalid @enderror" value="{{ $other_employee_edit->designation}}"  name="designation" placeholder="পদবী" required>
	                        @error('designation')
	                            <small class="text-danger">
	                                <strong>{{ $message }}</strong>
	                            </small>
	                        @enderror
	                    </div>
	                    <div class="form-group col-md-4">
	                        <label for="">মোবাইল</label>
	                        <input type="tel" class="form-control @error('contact') is-invalid @enderror"  value="{{ $other_employee_edit->contact }}" name="contact" placeholder="মোবাইল" required>
	                        @error('contact')
	                            <small class="text-danger">
	                                <strong>{{ $message }}</strong>
	                            </small>
	                        @enderror
	                    </div>
	                </div>
	                <button class="btn btn-primary" type="submit">সাবমিট</button>
	            </form>
	        </div>
	    </div>

@stop


