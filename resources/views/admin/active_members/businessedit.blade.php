@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> এসেসমেন্ট নিবন্ধন
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
                        <h4> ব্যাবসা প্রতিষ্ঠান আপডেট করুন</h4>
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
                            <form role="form" action="{{ route('update.business', $user->id) }}" method="post"
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
                                         <input type="text" pattern="[0-9]+" oninput="contactNumber(this.id);" maxlength="11" class="form-control mobilenumber" id="mobile"
                                   placeholder="মোবাইল" name="mobilenumber" value="{{ old('mobilenumber',$user->mobile)}}" required="">
                                   <span id="dupmobile" style="color: red;"></span>

                                            @error('mobile')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                               </small>
                                            @enderror
                                    </div>


                                    <div class="col-sm-3" style="margin-top: 5px;">
                                        <div class="form-group">
                                            <label for="business_type_id">ব্যবসার ধরণ<span
                                                style="color: red">*</span></label>
                                            <select id="business_type_id" name="business_type_id" class="form-control">
                                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                 @foreach ($business_types as $businesst)
                                                        <option value="{{ $businesst->id }}" {!! old('business_type_id', $user->business_type_id ) == $businesst->id ? 'selected="selected"' : '' !!}>
                                                            {{ $businesst->name }}</option>
                                                    @endforeach
                                            </select>

                                            @error('family_class')
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
                                                <label for="ward_id" class="col-form-label">ওয়ার্ড নং <span
                                                        style="color: red">*</span></label>
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
                                                <label for="village_id" class="col-form-label">গ্রাম <span
                                                        style="color: red">*</span></label>
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
                                                <label for="road_moholla" class="col-form-label">মহল্লা <span
                                                        style="color: red">*</span> </label>
                                                <input type="text" name="road_moholla" value="{{ old('road_moholla',$user->road_moholla) }}"
                                                    class="form-control" id="road_moholla" placeholder="মহল্লা "
                                                    autocomplete="off" required="">

                                                    @error('road_moholla')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>   
                                            <div class="col-sm-4">
                                                <label for="holding_no" class="col-form-label">প্রতিষ্ঠানের হোল্ডিং নং<span
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

                                              <div class="col-md-4">
                                                <label for="shopno" class="col-form-label">দোকান নং<span
                                                        style="color: red">*</span></label>
                                                <input type="text" name="shopno" value="{{ old('shopno',$user->shopno) }}"
                                                    class="form-control" id="shopno" placeholder="দোকান নং"
                                                    autocomplete="off" required="">

                                                    @error('shopno')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                              <div class="col-md-4">
                                                <label for="business_name" class="col-form-label">প্রতিষ্ঠানের নাম<span
                                                        style="color: red">*</span></label>
                                                <input type="text" name="business_name" value="{{ old('business_name',$user->business_name) }}"
                                                    class="form-control" id="business_name" placeholder="প্রতিষ্ঠানের নাম"
                                                    autocomplete="off" required="">

                                                    @error('business_name')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="business_address" class="col-form-label">প্রতিষ্ঠানের ঠিকানা <span
                                                        style="color: red">*</span></label>
                                                        <textarea class="form-control" name="business_address" placeholder="প্রতিষ্ঠানের ঠিকানা "
                                                    autocomplete="off" required="">{{ old('business_address',$user->business_address) }}</textarea>
                                                

                                                    @error('business_address')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="current_address" class="col-form-label">বর্তমান ঠিকানা  <span
                                                        style="color: red">*</span></label>
                                                        <textarea class="form-control" name="current_address" placeholder="বর্তমান ঠিকানা  "
                                                    autocomplete="off" required="">{{ old('current_address',$user->current_address) }}</textarea>
                                                

                                                    @error('current_address')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="permanent_address" class="col-form-label"> স্থায়ী ঠিকানা  <span
                                                        style="color: red">*</span></label>
                                                        <textarea class="form-control" name="permanent_address" placeholder="স্থায়ী ঠিকানা  "
                                                    autocomplete="off" required="">{{ old('permanent_address',$user->permanent_address) }}</textarea>
                                                

                                                    @error('permanent_address')
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
                                                <label for="trade_fee" class="col-form-label">বাণিজ্য ফি<span
                                                        style="color: red">*</span></label>
                                                <input type="text" pattern="[0-9]+" name="trade_fee" value="{{ old('trade_fee',$user->trade_fee) }}"
                                                    class="form-control" id="trade_fee" placeholder="বাণিজ্য ফি"
                                                    autocomplete="off" required="">

                                                    @error('trade_fee')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                             <div class="col-md-4">
                                                <label for="vat" class="col-form-label">
ভ্যাট<span
                                                        style="color: red">*</span></label>
                                                <input type="text" pattern="[0-9]+" name="vat" value="{{ old('vat',$user->vat) }}"
                                                    class="form-control" id="vat" placeholder="ভ্যাট"
                                                    autocomplete="off" required="">

                                                    @error('vat')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="signboard_tax" class="col-form-label">
সাইনবোর্ড ট্যাক্স  <span
                                                        style="color: red">*</span></label>
                                                <input type="text" pattern="[0-9]+" name="signboard_tax" value="{{ old('signboard_tax',$user->signboard_tax) }}"
                                                    class="form-control" id="signboard_tax" placeholder="সাইনবোর্ড ট্যাক্স  "
                                                    autocomplete="off" required="">

                                                    @error('signboard_tax')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="business_tax" class="col-form-label">
বাণিজ্য ট্যাক্স <span
                                                        style="color: red">*</span></label>
                                                <input type="text" pattern="[0-9]+" name="business_tax" value="{{ old('business_tax',$user->business_tax) }}"
                                                    class="form-control" id="business_tax" placeholder="বাণিজ্য ট্যাক্স "
                                                    autocomplete="off" required="">

                                                    @error('business_tax')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <label for="other_tax" class="col-form-label">
অন্যান্য ট্যাক্স  <span
                                                        style="color: red">*</span></label>
                                                <input type="text" pattern="[0-9]+" name="other_tax" value="{{ old('other_tax',$user->other_tax) }}"
                                                    class="form-control" id="other_tax" placeholder="অন্যান্য ট্যাক্স  "
                                                    autocomplete="off" required="">

                                                    @error('other_tax')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                             <div class="col-md-4">
                                                <label for="trade_total" class="col-form-label">
মোট বাণিজ্য<span
                                                        style="color: red">*</span></label>
                                                <input type="text" pattern="[0-9]+" name="trade_total" value="{{ old('trade_total',$user->trade_total) }}"
                                                    class="form-control" id="trade_total" placeholder="মোট বাণিজ্য"
                                                    autocomplete="off" required="">

                                                    @error('trade_total')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                    @enderror
                                            </div>

                                          

                                          


                                            <div class="col-sm-4">
                                                <label for="last_license_issue_year" class="col-form-label">সর্বশেষ পরিশোধিত অর্থবছর</label>
                                                <select name="last_license_issue_year" id="last_license_issue_year" class="form-control"
                                                     >
                                                    <option value="" >নির্বাচন করুন</option>
                                                   @php
                                        $date_past = date("Y", strtotime('-10 year')); 
$date_year = date("Y");


                                                   @endphp
                                                   @for($i=$date_year;$i>=$date_past;$i--)
                                                    <option {!! old('last_license_issue_year', $user->last_license_issue_year ) == $i ? 'selected="selected"' : '' !!} value="{{ $i }}">
                                                        {{ $i }}</option>
                                                    @endfor
                                                 
                                                </select>
                                               
                                                @error('last_license_issue_year')
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
                                                    <input type="text" pattern="[0-9]+" name="service_charge"
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
