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
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <h5 style="padding-top: 15px"><u>খানা প্রধানের তথ্য</u></h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="owner_name" class="col-form-label">নাম <span style="color: red">*</span></label>
                            <input type="text" name="owner_name" oninput="fullName(this.id);" maxlength="30"  class="form-control" id="owner_name" placeholder="নাম">
                        </div>
                        <div class="col-sm-4">
                            <label for="father_name" class="col-form-label">
                                <select id="gurdian_status" name="gurdian_status"><span style="color: red">*</span>
                                    <option value="father">পিতার নাম </option>
                                    <option value="husband">স্বামীর নাম</option>
                                </select>
                            </label>
                            <span style="color: red">*</span>
                            <input type="text" name="father_name" value="" class="form-control gurdian_status" id="father_name" placeholder="পিতার  নাম">
                        </div>

                        <div class="col-sm-4">
                            <label for="nid_birth" class="col-form-label">
                                <select id="birth_nid" name="birth_nid" class="getbirthnid">
                                    <option value="nid">এনআইডি নম্বর</option>
                                    <option value="birth_id_no">জন্ম নিবন্ধন নম্বর</option>
                                </select>
                                <span style="color: red">*</span></label>
                            <input type="text" name="nid" value="" class="form-control birth_nid" id="nid_birth" placeholder="এনআইডি নম্বর">
                        </div>

                    </div><br>
                    <div class="row">

                        <div class="col-sm-4">
                            <label for="mobile" class="col-form-label">মোবাইল<span style="color: red">*</span></label>
                            <input type="text" oninput="contactNumber(this.id);" maxlength="11" name="mobile" value="" class="form-control mobile" id="mobile" placeholder="মোবাইল" required="">
                        </div>
                        <div class="col-sm-4">
                            <label for="ward_id" class="col-form-label">ওয়ার্ড নং</label>
                            <select name="ward_id" id="ward_id" class="form-control">
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @php
                                    $wards = DB::table('wards')->orderBy('id', 'DESC')->get();
                                @endphp
                                @foreach($wards as $ward)
                                    <option value="{{$ward->id}}">{{$ward->ward_no}}</option>
                                @endforeach

                            </select>
                        </div>

                    </div><br>

                    <h5 style="padding-top: 15px"><u>ব্যবসার বিবরণ</u></h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="" class="col-form-label">প্রতিষ্ঠানের হোল্ডিং নং<span style="color: red">*</span></label>
                            <input type="text" name="" class="form-control" placeholder="প্রতিষ্ঠানের হোল্ডিং নং" id="">
                        </div>
                        <div class="col-sm-4">
                            <label for="" class="col-form-label">দোকান নং<span style="color: red">*</span></label>
                            <input type="text" name="" class="form-control" placeholder="দোকান নং" id="">
                        </div>
                        <div class="col-sm-4">
                            <label for="" class="col-form-label">প্রতিষ্ঠানের নাম<span style="color: red">*</span></label>
                            <input type="text" name="" class="form-control" placeholder="প্রতিষ্ঠানের নাম" id="">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-4">
                            <label for="business_type" class="col-form-label">ব্যবসার ধরণ</label>
                            <select name="business_types" class="form-control" id="">
                                <option value="" disabled>ব্যাবসার ধরন নির্বাচন করুন</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="photo" class="col-form-label">ছবি সংযুক্ত করুন</label>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <img src="https://via.placeholder.com/150" class="img-responsive img-thumbnail img-fluid">
                        </div>
                    </div><br>



                    <center>
                        <div style="" id="showSubmitButton">
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#image").css("display", "block");
                $('#image')
                    .attr('src', e.target.result)
                    .width(80)
                    .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

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
