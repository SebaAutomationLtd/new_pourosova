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
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show">
                    <center>{{Session::get('message')}}</center>
                </div>
            @endif
            <div class="website-form form-group">
                <!--                <div class="card-header">
                                    <h3 class="card-title"> বসতবাড়ী হোল্ডিং নিবন্ধন করুন</h3>
                                </div>-->
                <form role="form" action="" method="post">
                    @csrf
                    <h5 style="padding-top: 15px"><u>খানা প্রধানের তথ্য</u></h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="name" class="col-form-label">নাম <span style="color: red">*</span></label>
                            <input type="text" name="name" oninput="fullName(this.id);" maxlength="30" class="form-control" id="name" placeholder="নাম" required="">
                        </div>
                        <div class="col-sm-4" id="father_name">
                            <label for="father_name" class="col-form-label">
                                <select id="gurdian_status" name="gurdian_status" required="">
                                    <option value="father">পিতার নাম </option>
                                    <option value="husband">স্বামীর নাম</option>
                                </select>
                                <span style="color: red">*</span></label>
                            <input type="text" name="father_name" value="" class="form-control gurdian_status" id="father_name" placeholder="পিতার নাম " required="">
                        </div>
                        <div class="col-sm-4">
                            <label for="Birthdatepicker" class="col-form-label">জন্ম তারিখ <span style="color: red">*</span></label>
                            <input class="form-control" type="date" name="dob">
                        </div>
                    </div><br>

                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <label for="nid_birth" class="col-form-label">
                                <select id="birth_nid" name="birth_nid" class="getbirthnid">
                                    <option value="nid">এনআইডি নম্বর</option>
                                    <option value="birth_id_no">জন্ম নিবন্ধন নম্বর</option>
                                </select>
                                <span style="color: red">*</span><span style="color: red">*</span></label>
                            <input type="number" min="1" name="nid" value="" class="form-control birth_nid" id="nid_birth"
                                   placeholder="এনআইডি নম্বর" required="">
                        </div>
                        <div class="col-sm-4">
                            <label for="mobile" class="col-form-label">মোবাইল  নম্বর <span style="color: red">*</span><span style="color: red">*</span></label>
                            <input type="text" oninput="contactNumber(this.id);" maxlength="11" class="form-control mobilenumber" id="mobile"
                                   placeholder="মোবাইল" required="">
                        </div>


                    </div>

                    <h5><u>ঠিকানার তথ্য</u> </h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="ward_id" class="col-form-label">ওয়ার্ড নং <span style="color: red">*</span></label>
                            <select name="ward_id" id="ward_id" class="form-control" required="">
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @foreach ($wards as $ward)
                                    <option value="{{ $ward->id }}">{{ $ward->ward_no }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="village_id" class="col-form-label">গ্রাম <span style="color: red">*</span></label>
                            <select name="village_id" id="setvillageid" class="form-control"required="">
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="holding_no" class="col-form-label">হোল্ডিং নং <span
                                    style="color: red">*</span> </label>
                            <input type="text" name="holding_no" value="" class="form-control"
                                   id="holding_no" placeholder="হোল্ডিং নং" required="">
                        </div>
                    </div><br>


                    <h5><u>অন্যান্য তথ্য</u> </h5>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="type_house" class="col-form-label">বাড়ির ধরণ<span
                                    style="color: red">*</span></label>
                            <input type="hidden" name="house_tax_rate" id="house_tax_rate">
                            <select name="type_house" id="type_house" class="form-control"
                                    required="">
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @foreach ($house_types as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="number_room" class="col-form-label">রুম পরিমাণ <span style="color: red">*</span></label>
                            <input type="number" min="1" name="number_room" value="" class="form-control"
                                   id="number_room" placeholder="রুম পরিমাণ"
                                   required="">
                        </div>
                    </div><br>

                    <center>
                        <div id="showSubmitButton">
                            <button onclick="return confirm('আপনি নিশ্চিত যে উপরের সকল তথ্য সঠিক ?')" type="submit" class="btn btn-primary save_data pull-right">সংরক্ষণ</button>
                        </div>
                    </center>
                </form>
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
                $(".gurdian_status").attr("name", "father_name");
                $(".gurdian_status").attr("placeholder", "পিতার নাম");
            } else {
                $(".gurdian_status").attr("name", "husband_name");
                $(".gurdian_status").attr("placeholder", "স্বামীর নাম");
            }
        });
        $(document).on('change', "#birth_nid", function () {
            var birth_nid = $("#birth_nid").val();
            if (birth_nid === 'nid') {
                $(".birth_nid").attr("name", "nid");
                $(".birth_nid").attr("placeholder", "এনআইডি");
            } else {
                $(".birth_nid").attr("name", "birth_certificate");
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
        $(document).on('blur', '.mobilenumber', function () {
            var mobile = $(this).val();
            $.get('{{URL::to("getduplicatenumber")}}' + '/' + mobile, function (data) {
                if (data !== 'No') {
                    alert(data);
                    $("#showSubmitButton").hide();
                } else {
                    $("#showSubmitButton").show();
                }
            });
        });
        $(document).on('change', '#ward_id', function () {
            var id = $(this).val();
            $.get('{{URL::to("getvillageinfo")}}' + '/' + +id, function (data) {
                if (data === 'no_data') {
                    alert("Sorry, No Data Found");
                    $("#setvillageid").html(
                        '<option value="" selected="" disabled="">নির্বাচন করুন</option>'
                    );
                } else {
                    $("#setvillageid").html(data);
                }
            });
        });

    });
</script>


@include ('frontend.include.footer')
