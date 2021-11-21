@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>এসেসমেন্ট নিবন্ধন</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> বসতবাড়ী হোল্ডিং আপডেট
                </a>
            </li>
            <!-- <li>সেবা কার্ড একটিভ প্যানেল</li> -->

        </ol>
    </section>
@stop
@section('content')


    <div class="content-wrapper">


        <section class="content  card card-primary">
            <div class="container-fluid">
                <div class="row mb-2" style="margin-top: 20px">
                    <div class="col-sm-6">
                        <h4> বসতবাড়ী হোল্ডিং আপডেট করুন</h4>
                    </div>
                    <!-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">হোম</a></li>
                            <li class="breadcrumb-item active"> বসতবাড়ী হোল্ডিং আপডেট করুন</li>
                        </ol>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-12">
          

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
                        <div class=" website-form form-group">
                            <!-- <div class="card-header">
                                <h3 class="card-title"> বসতবাড়ী হোল্ডিং আপডেট করুন</h3>
                            </div> -->
                            <form role="form" action="{{ route('update.bosot-bari', $user->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                 @php
                                    $user_info = DB::table('users')->where('id',$user->user_id)->first();

                                    @endphp

                                <h5><u>খানা প্রধানের তথ্য</u></h5>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="name" class="col-form-label">নাম <span
                                                style="color: red">*</span></label>
                                        <input type="text" name="name" value="{{old('name', $user_info->name)}}" class="form-control"
                                            id="name" placeholder="নাম" autocomplete="off" required="">

                                            @error('name')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror

                                    </div>
                                    <div class="col-sm-4" id="father_name">
                                        <label for="father_name" class="col-form-label">
                                            <select id="gurdian_status" name="gurdian_status">
                                                <option {!! old('gurdian_status', $user->spouse) == null ? 'selected="selected"' : '' !!}  value="father" >পিতার নাম </option>
                                                <option {!! old('gurdian_status', $user->father) == null ? 'selected="selected"' : '' !!} value="husband" >স্বামীর নাম</option>
                                            </select>
                                            <span style="color: red">*</span></label>
                                        @if ($user->spouse == null)
                                            <input type="text" name="father_name" value="{{old('father_name', $user->father) }}"
                                                class="form-control gurdian_status" id="father_name" autocomplete="off"
                                                placeholder="পিতার নাম " required="">

                                                @error('father_name')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                @enderror
                                            @else
                                            <input type="text" name="father_name" value="{{ old('father_name',$user->spouse) }}"
                                                class="form-control gurdian_status" id="husband_name" autocomplete="off"
                                                placeholder="স্বামীর নাম " required="">

                                                @error('husband_name')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                @enderror
                                        @endif
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="mother_name" class="col-form-label">মাতার নাম <span
                                                style="color: red">*</span></label>
                                        <input type="text" name="mother_name" value="{{old('mother_name', $user->mother) }}"
                                            class="form-control" id="mother_name" placeholder="মায়ের নাম"
                                            autocomplete="off" required="">

                                            @error('mother_name')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="inputPassword3" class="col-form-label">লিঙ্গ <span
                                                style="color: red">*</span></label>
                                        <select name="gender" id="gender" class="form-control" required="">
                                            <option value="" selected="" disabled="">নির্বাচন করুন</option>
@foreach ($genders as $gender)
                                                        <option value="{{ $gender->id }}" {!! old('gender', $user->gender) == $gender->id ? 'selected="selected"' : '' !!}>
                                                            {{ $gender->name }}</option>
                                                    @endforeach 
                                        </select>

                                        @error('gender')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="inputPassword3" class="col-form-label">বৈবাহিক অবস্থা<span
                                                style="color: red">*</span></label>
                                        <select name="martial" id="martial_status" class="form-control" required="">
                                              <option value="" >নির্বাচন করুন</option>
@foreach ($marital_statuses as $marital)
<option value="{{ $marital->id }}" {!! old('martial', $user->marital_status) == $marital->id ? 'selected="selected"' : '' !!}>
                                                            {{ $marital->name }}</option>
                                                    @endforeach 
                                        </select>

                                        @error('martial_status')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                    </div>


                                    <div class="col-sm-4">
                                        <label for="Birthdatepicker" class="col-form-label">জন্ম তারিখ</label>
                                       
                <input class="form-control" type="date" value="{{ old('dob',$user->dob) }}" name="dob">

                                                @error('dob')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                </small>
                                                @enderror
                                    </div>



                                    <div class="col-sm-3">
                                        <label for="nid_birth" class="col-form-label">
                                            <select id="birth_nid" name="birth_nid">
                                                <option {!! old('birth_nid', $user->birth_certificate) == null ? 'selected="selected"' : '' !!} value="nid">এনআইডি নম্বর</option>
                                                <option value="birth_id_no" {!! old('birth_nid', $user->nid) == null ? 'selected="selected"' : '' !!}>জন্ম নিবন্ধন নম্বর</option>
                                            </select>
                                            <span style="color: red">*</span></label>
                                        @if ($user->birth_certificate == null)
                                            <input type="text" name="nid" value="{{ old('nid',$user->nid) }}"
                                                class="form-control birth_nid" id="nid_birth" autocomplete="off"
                                                placeholder="এনআইডি নম্বর" required="">

                                                @error('nid')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror

                                        @else
                                            <input type="text" name="nid"
                                                value="{{ old('nid',$user->birth_certificate) }}" class="form-control birth_nid"
                                                id="nid_birth" autocomplete="off" placeholder="এনআইডি নম্বর" required="">

                                                @error('birth_certificate')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror

                                        @endif
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="mobile" class="col-form-label">মোবাইল<span
                                                style="color: red">*</span></label>
                                         <input type="text" oninput="contactNumber(this.id);" maxlength="11" class="form-control mobilenumber" id="mobile"
                                   placeholder="মোবাইল" name="mobilenumber" value="{{ old('mobilenumber',$user->mobile)}}" required="">
                                   <span id="dupmobile" style="color: red;"></span>

                                            @error('mobile')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="religion_id" class="col-form-label">ধর্ম  <span
                                                style="color: red">*</span></label>
                                        <select name="religion_id" id="religion_id" class="form-control"  required="">
                                             <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                           @foreach ($religions as $religion)
                                                        <option value="{{ $religion->id }}" {!! old('religion_id', $user->religion) == $religion->id ? 'selected="selected"' : '' !!}>
                                                            {{ $religion->name }}</option>
                                                    @endforeach                                        </select>

                                        @error('religion_id')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                    </div>

                                    <div class="col-sm-3" style="margin-top: 5px;">
                                        <div class="form-group">
                                            <label for="family_class">পরিবারের শ্রেণী</label>
                                            <select id="family_class" name="family_class" class="form-control">
                                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                 @foreach ($family_classes as $familyclass)
                                                        <option value="{{ $familyclass->id }}" {!! old('family_class', $user->family_class_id ) == $familyclass->id ? 'selected="selected"' : '' !!}>
                                                            {{ $familyclass->name }}</option>
                                                    @endforeach
                                            </select>

                                            @error('family_class')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-sm-3" style="margin-top: 5px;">
                                        <div class="form-group">
                                            <label for="family_class">পরিবারের জনসংখ্যা (পুরুষ)</label>
                                            <input value="{{ old('member_male',$user->total_male) }}" name="member_male" type="number"
                                                class="form-control" placeholder="পরিবারের জনসংখ্যা (পুরুষ)">

                                                @error('member_male')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-3" style="margin-top: 5px;">
                                        <div class="form-group">
                                            <label for="family_class">পরিবারের জনসংখ্যা (মহিলা)</label>
                                            <input value="{{ old('member_female',$user->total_female) }}" name="member_female" type="number"
                                                class="form-control" placeholder="পরিবারের জনসংখ্যা (মহিলা)">

                                                @error('member_female')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <br />

                                <div class="form-group">







                                    <!-- Addess Information -->
                                    <div class="form-group">
                                        <h5><u>ঠিকানার তথ্য</u> </h5>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="ward_id" class="col-form-label">ওয়ার্ড নং</label>
                                                <select name="ward_id" id="ward_id" class="form-control"  >
                                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                   
                                                    @foreach ($wards as $ward)
                                                    <option value="{{ $ward->id }}"{!! old('ward_id', $user->ward_id ) == $ward->id ? 'selected="selected"' : '' !!}>
                                                            {{ $ward->ward_no }}</option>
                                                    @endforeach
                                                </select>

                                                @error('ward_id')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="village_id" class="col-form-label">গ্রাম </label>
                                                <select name="village_id" id="village_id" class="form-control"
                                                     >
                                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                   
                                                    @foreach ($villages as $village)
                                                        <option value="{{ $village->id }}" {!! old('village_id', $user->village_id ) == $village->id ? 'selected="selected"' : '' !!}>
                                                            {{ $village->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('village_id')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="holding_no" class="col-form-label">হোল্ডিং নং <span
                                                        style="color: red">*</span> </label>
                                                <input type="text" name="holding_no" value="{{ old('holding_no',$user->holding_no) }}"
                                                    class="form-control" id="holding_no" placeholder="হোল্ডিং নং"
                                                    autocomplete="off" required="">

                                                    @error('holding_no')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>


                                            <div class="col-sm-4">
                                                <label for="post_office_id" class="col-form-label">ডাক ঘর</label>
                                                <select name="post_office_id" id="post_office_id" class="form-control">
                                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>

                                                    @foreach ($post_offices as $postoffice)
                                                        <option value="{{ $postoffice->id }}" {!! old('post_office_id', $user->post_office_id ) == $postoffice->id ? 'selected="selected"' : '' !!}>
                                                            {{ $postoffice->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('post_office_id')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="post_office_id" class="col-form-label">বিদ্যুৎ সুবিধাভোগি
                                                    কিনা?</label>
                                                <select name="biddut"   class="form-control">
                                                    <option value="">নির্বাচন করুন</option>
                                                    <option {{ old('biddut',$user->biddut) == 1 ? 'selected' : '' }} value="1">হ্যা
                                                    </option>
                                                    <option {{ old('biddut',$user->biddut) == 2 ? 'selected' : '' }} value="2">না
                                                    </option>
                                                </select>
                                                @error('biddut')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="post_office_id" class="col-form-label">স্যানিটেশনের তথ্য</label>
                                                <select name="sanitation"   class="form-control">
                                                     <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                    @foreach ($sanitations as $sanitation)
                                                        <option value="{{ $sanitation->id }}" {!! old('sanitation', $user->sanitation_id ) == $sanitation->id ? 'selected="selected"' : '' !!}>
                                                            {{ $sanitation->name }}</option>
                                                    @endforeach 
                                                </select>
                                                @error('sanitation')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>


                                        </div>
                                    </div>

                                    <!-- Other Information -->
                                    <div class="form-group">
                                        <h5><u>অন্যান্য তথ্য</u> </h5>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="type_house" class="col-form-label">বাড়ির ধরণ<span
                                                        style="color: red">*</span></label>
                                                <input type="hidden" name="house_tax_rate" id="house_tax_rate"
                                                    value="{{ $user->yearly_vat }}">

                                                <select name="type_house" id="type_house" class="form-control" required="">
                                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                     @foreach ($house_types as $house_type)
                                                        <option value="{{ $house_type->id }}"  {!! old('type_house', $user->house_type_id ) == $house_type->id ? 'selected="selected"' : '' !!}>
                                                            {{ $house_type->name }}</option>
                                                    @endforeach   
                                                </select>
                                                @error('type_house')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="number_room" class="col-form-label">রুম পরিমাণ<span
                                                        style="color: red">*</span></label>
                                                <input type="text" name="number_room" value="{{ old('number_room',$user->total_room) }}"
                                                    class="form-control" id="number_room" placeholder="রুম পরিমাণ"
                                                    autocomplete="off" required="">

                                                    @error('number_room')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="height" class="col-form-label">দৈর্ঘ<span style="color: red">*</span></label>
                                                <input type="text" name="height" value="{{old('height',$user->height)}}" class="form-control @error('height') is-invalid @enderror" placeholder="দৈর্ঘ" autocomplete="off" required="">
                                                @error('height')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                @enderror
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <label for="width" class="col-form-label">প্রস্থ<span style="color: red">*</span></label>
                                                <input type="text" name="width" value="{{old('width',$user->width)}}" class="form-control @error('width') is-invalid @enderror" placeholder="প্রস্থ" autocomplete="off" required="">
                                                @error('width')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="monthly_income" class="col-form-label">মাসিক আয় </label>
                                                <input type="number" name="monthly_income"
                                                    value="{{ old('monthly_income',$user->monthly_income) }}"
                                                    class="form-control monthly_income" id="house_annual_val"
                                                    placeholder="মাসিক আয়" autocomplete="off">

                                                    @error('monthly_income')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror 
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="house_year_value" class="col-form-label">বাড়ির বার্ষিক
                                                    মান</label>
                                                <input type="number" name="house_year_value"
                                                    value="{{ old('house_year_value',$user->yearly_value) }}"
                                                    class="form-control house_year_value" id="house_annual_val"
                                                    placeholder="বাড়ির বার্ষিক মান" autocomplete="off">

                                                    @error('house_year_value')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="yearly_vat" class="col-form-label">বার্ষিক কর</label>

                                                <input type="number" name="yearly_vat" class="form-control yearly_vat"
                                                    placeholder="বার্ষিক কর" value="{{ old('yearly_vat',$user->yearly_vat) }}">


                                            </div>

                                            <div class="col-sm-4">
                                                <label for="occupation_id" class="col-form-label"  >পেশা </label>

                                                <select name="occupation_id" id="occupation_id" class="form-control">
                                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                    @foreach ($occupations as $ocupation)
                                                        <option value="{{ $ocupation->id }}" {!! old('occupation_id', $user->occupation_id ) == $ocupation->id ? 'selected="selected"' : '' !!}>
                                                            {{ $ocupation->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('occupation_id')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                <label for="last_tax_year" class="col-form-label">সর্বশেষ ট্যাক্স পরিশোধ
                                                    অর্থবছর</label>
                                                <select name="last_tax_year" id="last_tax_year" class="form-control"
                                                     >
                                                    <option value="" >নির্বাচন করুন</option>
                                                   @php
                                        $date_past = date("Y", strtotime('-10 year')); 
$date_year = date("Y");


                                                   @endphp
                                                   @for($i=$date_year;$i>=$date_past;$i--)
                                                    <option {!! old('last_tax_year', $user->last_tax_year ) == $i ? 'selected="selected"' : '' !!} value="{{ $i }}">
                                                        {{ $i }}</option>
                                                    @endfor
                                                 
                                                </select>
                                               
                                                @error('last_tax_year')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <h5><u>ছবি </u> </h5>
                                            <div class="row">
                                                <div class="col-sm-4">
                            <label for="photo" class="col-form-label">ছবি সংযুক্ত করুন</label>
                            <input type="file" id="photo" name="photo" onchange="loadFile(event)" class="form-control">
                            <span id="perror" style="color: red;"></span>
                        </div>
                        <div class="col-sm-4">
                            <img id="output" src="@if($user->photo) {{asset('img/'.$user->photo)}} @else https://via.placeholder.com/150 @endif" class="img-responsive img-thumbnail img-fluid">
                        </div>
                                            </div>
                                        </div>

                                        <!-- Other Information -->
                                        <br>
                                        <div class="form-group">
                                            <h5><u>পেমেন্ট সংগ্রহ করুন</u> </h5>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="service_charge" class="col-form-label">নিবন্ধন চার্জ<span
                                                            style="color: red">*</span></label>
                                                    <input type="text" name="service_charge"
                                                        value="{{ old('service_charge',$user->service_charge) }}" class="form-control"
                                                        id="service_charge" placeholder="নিবন্ধন চার্জ" autocomplete="off" required="">

                                                        @error('service_charge')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="payment_type" class="col-form-label">পেমেন্ট প্রকার <span
                                                            style="color: red">*</span></label>
                                                    <select name="payment_type" id="payment_type" class="form-control"
                                                          required="">
                                                        <option value="" >নির্বাচন করুন</option>
                                                        @if($payment_methods)
                                                        @foreach($payment_methods as $payment)
                                                        <option {!! old('payment_type', $user->payment_method_id ) == $payment->id ? 'selected="selected"' : '' !!} value="{{$payment->id}}">{{$payment->name}}</option>
@endforeach
@endif
                                                    </select>

                                                    @error('payment_type')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                               <div class="col-md-4">
                                                    <label for="inputName" class="col-form-label">একশন
                                                    <span style="color: red">*</span>
                                                </label>
                                                
                                                    <select required class="form-control" name="status" id="">
                                                        <option value="">নির্বাচন করুন</option>
                                                        <option {{ $user->status == 0 ? 'selected' : '' }} value="1">একটিভ
                                                        </option>
                                                        <option {{ $user->status == 1 ? 'selected' : '' }} value="0">
                                                            ডিএকটিভ</option>
                                                    </select>
                                               </div>
                                                
                                            </div>

                                        
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">আপডেট</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
    </div>
    </section>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on('change', "#gurdian_status", function() {
                var gurdian_status = $("#gurdian_status").val();
                if (gurdian_status == 'father') {
                    // $(".gurdian_status").attr("name", "father_name");
                    $(".gurdian_status").attr("placeholder", "পিতার নাম");
                } else {
                    // $(".gurdian_status").attr("name", "husband_name");
                    $(".gurdian_status").attr("placeholder", "স্বামীর নাম");
                }
            });

            $(document).on('change', "#birth_nid", function() {
                var birth_nid = $("#birth_nid").val();
                if (birth_nid == 'nid') {
                    // $(".birth_nid").attr("name", "nid");
                    $(".birth_nid").attr("placeholder", "এনআইডি");
                } else {
                    // $(".birth_nid").attr("name", "birth_certificate");
                    $(".birth_nid").attr("placeholder", "জন্ম নিবন্ধন নম্বর");
                }
            });

            $(document).on('change', '#ward_id', function() {
                var id = $('#ward_id').val();
                $.ajax({
                    url: "{{ url('/getvillageinfo/') }}/" + id,

                    type: "GET",
                    dataType: "html",
                    success: function(data) {


                        if (data == 'no_data') {
                            toastr.error("Sorry, No Data Found");
                            $("#village_id").html(
                                '<option value="" selected="" disabled="">নির্বাচন করুন</option>'
                            );
                        } else {
                            $("#village_id").html(data);
                        }





                    },

                });
            });


            $(document).on('change', '#post_code_id', function() {
                var id = $('#post_code_id').val();
                $.ajax({
                    url: "{{ url('/get-post_office/') }}/" + id,

                    type: "GET",
                    dataType: "html",
                    success: function(data) {


                        if (data == 'no_data') {
                            toastr.error("Sorry, No Data Found");
                            $("#post_office_id").html(
                                '<option value="" selected="" disabled="">--নির্বাচন করুন--</option>'
                            );
                        } else {
                            $("#post_office_id").html(data);
                        }






                    },

                });
            });
            //house_tax_rate
            $(document).on('change', '#type_house', function() {
                var id = $("#type_house").val();
                var house_tax_rate = $("#house_tax_rate").val();
                $.ajax({
                    url: "{{ url('/get-house_tax_rate/') }}/" + id,

                    type: "GET",
                    dataType: "html",
                    success: function(data) {



                        $("#house_tax_rate").val(data);



                    },

                });
            });

            $(document).on('input', '.house_year_value', function() {
                var type_house = $("#type_house").val();
                var house_year_value = $('.house_year_value').val();

                var house_tax_rate = $("#house_tax_rate").val();
                var parse_house_tax_rate = parseInt(house_tax_rate);
                var parse_house_year_value = parseInt(house_year_value);
                var result = parse_house_year_value + parse_house_year_value * parse_house_tax_rate / 100;

                $(".yearly_vat").val(result);




            });
function contactNumber(id) {
        // Only Number will write
        var element = document.getElementById(id);
        var regex = /[^0-9]/gi;
        element.value = element.value.replace(regex, "");
    }
              $(document).on('keyup', '.mobilenumber', function () {
            var mobile = $(this).val();
            $.get('{{URL::to("getduplicatenumber")}}' + '/' + mobile, function (data) {
                if (data !== 'No') {
                    // alert(data);
                    $("#dupmobile").text(data);
                    $("#showSubmitButton").hide();
                } else {
                     $("#dupmobile").text('');
                    $("#showSubmitButton").show();
                }
            });
        });

            $(document).on('input', '.birth_nid', function() {
                var birth_nid = $('.birth_nid').val();
                var attr = $(this).attr('name');

                $.ajax({
                    url: "{{ url('/check-birth_nid') }}",

                    type: "GET",
                    data: {
                        'birth_nid': birth_nid,
                        'attr': attr
                    },
                    dataType: "html",
                    success: function(data) {

                        // if (birth_nid == "") {
                        //     $('.save_data').css('cursor', 'pointer');
                        // } else if (data == 'birth_exist') {
                        //     toastr.error("Already, This Birth Certificate Number has been exist");
                        //     $('.save_data').css('cursor', 'not-allowed');
                        // } else if (data == 'nid_exist') {
                        //     toastr.error("Already, This National ID Number has been exist");
                        //     $('.save_data').css('cursor', 'not-allowed');
                        // } else {
                        //     $('.save_data').css('cursor', 'pointer');
                        // }


                    },

                });
            });

        });
    </script>
<script>
  var loadFile = function(event) {
    var sizeInKB = event.target.files[0].size/1024; //Normally files are in bytes but for KB divide by 1024 and so on
var sizeLimit= 1024;

if (sizeInKB >= sizeLimit) {
    $("#perror").text("Max file size 1MB");
      $("#showSubmitButton").hide();
}else {
     $("#perror").text("");
       $("#showSubmitButton").show();
}

var validExtensions = ["jpg","jpeg","png"]
    var file = $("#photo").val().split('.').pop();
    if (validExtensions.indexOf(file) == -1) {
        $("#perror").text("Only formats are allowed : "+validExtensions.join(', '));
          $("#showSubmitButton").hide();

    }
    else {
     $("#perror").text("");
       $("#showSubmitButton").show();
}
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }

  };
</script>
@endsection
