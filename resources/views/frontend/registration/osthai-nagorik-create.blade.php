@include ('frontend.include.header')

<div class="container">
    <div class="row mb-2" style="margin-top: 20px">
        <div class="col-sm-6">
            <h4>{{$title}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)">রেজিস্ট্রেশন</a></li>
                <li class="breadcrumb-item active"> {{$title}}</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <center>{{Session::get('success')}}</center>
                </div>
            @endif

             @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <center>{{Session::get('error')}}</center>
                </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="website-form form-group">
                <!--                <div class="card-header">
                                    <h3 class="card-title"> বসতবাড়ী হোল্ডিং নিবন্ধন করুন</h3>
                                </div>-->
                <form role="form" action="{{route('bosot-bari-store')}}" method="post">
                    @csrf
                    <h5 style="padding-top: 15px"><u>খানা প্রধানের তথ্য</u></h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="name" class="col-form-label">নাম <span style="color: red">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" oninput="fullName(this.id);" maxlength="100" class="form-control" id="name" placeholder="নাম" required="">

                        </div>
                        <div class="col-sm-4" id="father_name">
                            <label for="father_name" class="col-form-label">
                                <select id="gurdian_status" name="gurdian_status" required="">
                                    <option  value="father" @if (old('gurdian_status') == 'father') selected="selected" @endif>পিতার নাম </option>
                                    <option  value="husband" @if (old('gurdian_status') == 'husband') selected="selected" @endif>স্বামীর নাম</option>
                                </select>
                                <span style="color: red">*</span></label>
                            <input type="text" name="father_name"  class="form-control gurdian_status" id="father_name" value="{{ old('father_name') }}" placeholder="পিতার নাম " required="">
                        </div>
                        <div class="col-sm-4">
                            <label for="Birthdatepicker" class="col-form-label">জন্ম তারিখ <span style="color: red">*</span></label>
                            <input class="form-control" type="date" value="{{ old('dob') }}" name="dob">
                        </div>
                    </div><br>

                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <label for="nid_birth" class="col-form-label">
                                <select id="birth_nid" name="birth_nid" class="getbirthnid">
                                    <option value="nid" @if(old('birth_nid') == 'nid') selected="selected" @endif>এনআইডি নম্বর</option>
                                    <option value="birth_id_no" @if (old('birth_nid') == 'birth_id_no') selected="selected" @endif>জন্ম নিবন্ধন নম্বর</option>
                                </select>
                                <span style="color: red">*</span><span style="color: red">*</span></label>
                            <input type="text" pattern="[0-9]+" min="1" name="nid" value="{{ old('nid') }}" class="form-control birth_nid" id="nid_birth"
                                   placeholder="এনআইডি নম্বর" required="">
                        </div>
                        <div class="col-sm-4">
                            <label for="mobile" class="col-form-label">মোবাইল  নম্বর <span style="color: red">*</span><span style="color: red">*</span></label>
                            <input type="text" oninput="contactNumber(this.id);" maxlength="11" class="form-control mobilenumber" id="mobile"
                                   placeholder="মোবাইল" name="mobilenumber" value="{{ old('mobilenumber') }}" required="">
                                   <span id="dupmobile" style="color: red;"></span>
                        </div>


                    </div>

                    <h5><u>স্থায়ী ঠিকানাঃ</u> </h5>
                    <div class="row">

                        <div class="col-sm-4">
                            <label for="ward_id" class="col-form-label">বিভাগ <span style="color: red">*</span></label>
                            <select name="division_id" id="division_id" class="form-control" required="">
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}" @if (old('division_id') == $division->id) selected="selected" @endif >{{ $division->bn_name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-sm-4">
                            <label for="district_id" class="col-form-label">জেলা <span style="color: red">*</span></label>
                            <select name="district_id" id="setdistrictid" class="form-control"required="">
                                @if (old('district_id'))
                                 @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" @if (old('district_id') == $district->id) selected="selected" @endif >{{ $district->bn_name }}</option>
                                @endforeach

                                @else
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @endif
                                
                            </select>
                            <span id="dupgram" style="color: red;"></span>
                        </div>


                         <div class="col-sm-4">
                            <label for="upazila_id" class="col-form-label">উপজেলা <span style="color: red">*</span></label>
                            <select name="upazila_id" id="setupazilaid" class="form-control"required="">
                                 @if (old('upazila_id'))
                                 @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila->id }}" @if (old('upazila_id') == $upazila->id) selected="selected" @endif >{{ $upazila->bn_name }}</option>
                                @endforeach

                                @else
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @endif
                            </select>
                            <span id="dupgram" style="color: red;"></span>
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="thana" class="col-form-label">থানা<span style="color: red">*</span></label>
                            <input type="text"  value="{{ old('thana') }}" name="thana" value="" class="form-control"
                                   id="thana" placeholder="থানা"
                                   required="">
                        </div>

                        <div class="col-md-4">
                            <label for="post" class="col-form-label">পোস্ট<span style="color: red">*</span></label>
                            <input type="post"  value="{{ old('post') }}" name="post" value="" class="form-control"
                                   id="post" placeholder="পোস্ট"
                                   required="">
                        </div>

                        <div class="col-md-4">
                            <label for="home" class="col-form-label">বাসা<span style="color: red">*</span></label>
                            <input type="text"  value="{{ old('home') }}" name="home" value="" class="form-control"
                                   id="home" placeholder="বাসা"
                                   required="">
                        </div>
                    </div>

                    <br>

                    <h5><u>বর্তমান ঠিকানাঃ</u> </h5>
                    <div class="row">

                        <div class="col-sm-4">
                            <label for="ward_id" class="col-form-label">বিভাগ <span style="color: red">*</span></label>
                            <select name="division_id" id="division_id" class="form-control" required="">
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}" @if (old('division_id') == $division->id) selected="selected" @endif >{{ $division->bn_name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-sm-4">
                            <label for="district_id" class="col-form-label">জেলা <span style="color: red">*</span></label>
                            <select name="district_id" id="setvillageid" class="form-control"required="">

                                @if (old('district_id'))
                                 @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" @if (old('district_id') == $district->id) selected="selected" @endif >{{ $district->bn_name }}</option>
                                @endforeach

                                @else
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @endif

                                
                            </select>
                            <span id="dupgram" style="color: red;"></span>
                        </div>


                         <div class="col-sm-4">
                            <label for="upazila_id" class="col-form-label">উপজেলা <span style="color: red">*</span></label>
                            <select name="upazila_id" id="setvillageid" class="form-control"required="">
                                @if (old('upazila_id'))
                                 @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila->id }}" @if (old('upazila_id') == $upazila->id) selected="selected" @endif >{{ $upazila->bn_name }}</option>
                                @endforeach

                                @else
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @endif
                            </select>
                            <span id="dupgram" style="color: red;"></span>
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="thana" class="col-form-label">থানা<span style="color: red">*</span></label>
                            <input type="text"  value="{{ old('thana') }}" name="thana" value="" class="form-control"
                                   id="thana" placeholder="থানা"
                                   required="">
                        </div>

                        <div class="col-md-4">
                            <label for="post" class="col-form-label">পোস্ট<span style="color: red">*</span></label>
                            <input type="post"  value="{{ old('post') }}" name="post" value="" class="form-control"
                                   id="post" placeholder="পোস্ট"
                                   required="">
                        </div>

                        <div class="col-md-4">
                            <label for="home" class="col-form-label">বাসা<span style="color: red">*</span></label>
                            <input type="text"  value="{{ old('home') }}" name="home" value="" class="form-control"
                                   id="home" placeholder="বাসা"
                                   required="">
                        </div>
                    </div>

                    </div><br>


                    <center>
                        <div id="showSubmitButton">
                            <button onclick="return confirm('আপনি নিশ্চিত যে উপরের সকল তথ্য সঠিক ?')" type="submit" class="btn btn-primary save_data pull-right">সংরক্ষণ</button>
                        </div>
                    </center>
                </form>
              </div>
                <br>
            </div>
        </div>
    </div>
</div>
<script>
    function fullName(id) {
        // Only Capital or Small Chracters will write
        var element = document.getElementById(id);
        var regex = /[0-9,<>?/;:'",-=@#$%^&*()_+{}]/gi;
        element.value = element.value.replace(regex, "");
    }
    //Contact Number Validate
    function contactNumber(id) {
        // Only Number will write
        var element = document.getElementById(id);
        var regex = /[^0-9]/gi;
        element.value = element.value.replace(regex, "");
    }
    $(document).ready(function () {
        $('form').attr('autocomplete', 'off');
    });
    $(document).ready(function () {
        $(document).on('change', "#gurdian_status", function () {
            var gurdian_status = $("#gurdian_status").val();
            if (gurdian_status === 'father') {
                // $(".gurdian_status").attr("name", "father_name");
                $(".gurdian_status").attr("placeholder", "পিতার নাম");
            } else {
                // $(".gurdian_status").attr("name", "husband_name");
                $(".gurdian_status").attr("placeholder", "স্বামীর নাম");
            }
        });
        $(document).on('change', "#birth_nid", function () {
            var birth_nid = $("#birth_nid").val();
            if (birth_nid === 'nid') {
                // $(".birth_nid").attr("name", "nid");
                $(".birth_nid").attr("placeholder", "এনআইডি");
            } else {
                // $(".birth_nid").attr("name", "birth_certificate");
                $(".birth_nid").attr("placeholder", "জন্ম নিবন্ধন নম্বর");
            }
        });
        //NID/Birth No Validation
        $(document).on('blur', '.birth_nid', function () {
            var number = $(this).val();
            var value = $('.getbirthnid').val();
            if (value === 'nid') {
                var dataname = 'NID';
            } else {
                var dataname = 'Birth';
            }
            $.get('{{URL::to("getduplicatebirthnid")}}' + '/' + dataname + '/' + number, function (data) {
                if (data !== 'No') {
                    alert(data);
                    $("#showSubmitButton").hide();
                } else {
                    $("#showSubmitButton").show();
                }
            });
        });
        //Mobile No Validation
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
        // Holding


        /*---------District Get----------*/
        $(document).on('change', '#division_id', function () {
            var id = $(this).val();
            $.get('{{URL::to("getdistrictinfo")}}' + '/' + +id, function (data) {
                if (data === 'no_data') {
                    $("#dupgram").text("উক্ত ওয়ার্ড এ কোনও জেলা আমাদের ডাটাবেসে নেই");
                    $("#setdistrictid").html(
                        '<option value="" selected="" disabled="">নির্বাচন করুন</option>'
                    );
                } else {
                    $("#setdistrictid").html(data);
                     $("#dupgram").text("");

                   
                }
            });
        });


         /*---------Upazila Get----------*/
        $(document).on('change', '#district_id', function () {
            var id = $(this).val();
            $.get('{{URL::to("getupazilainfo")}}' + '/' + +id, function (data) {
                if (data === 'no_data') {
                    $("#dupgram").text("উক্ত জেলা এ কোনও উপজেলা আমাদের ডাটাবেসে নেই");
                    $("#setdistrictid").html(
                        '<option value="" selected="" disabled="">নির্বাচন করুন</option>'
                    );
                } else {
                    $("#setupazilaid").html(data);
                     $("#dupgram").text("");

                   
                }
            });
        });




    });
</script>


@include ('frontend.include.footer')
