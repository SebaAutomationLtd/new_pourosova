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
                <form role="form" action="{{route('business-ind-store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h5 style="padding-top: 15px"><u>খানা প্রধানের তথ্য</u></h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="name" class="col-form-label">নাম <span style="color: red">*</span></label>
                            <input type="text" name="name" oninput="fullName(this.id);" maxlength="100" value="{{ old('name') }}"  class="form-control" id="owner_name" placeholder="নাম">
                        </div>
                        <div class="col-sm-4">
                            <label for="father_name" class="col-form-label">
                                <select id="gurdian_status" name="gurdian_status"><span style="color: red">*</span>
                                   <option  value="father" @if (old('gurdian_status') == 'father') selected="selected" @endif>পিতার নাম </option>
                                    <option  value="husband" @if (old('gurdian_status') == 'husband') selected="selected" @endif>স্বামীর নাম</option>
                                </select>
                            </label>
                            <span style="color: red">*</span>
                            <input type="text" name="father_name" value="{{ old('father_name') }}" class="form-control gurdian_status" id="father_name" placeholder="পিতার  নাম">
                        </div>

                        <div class="col-sm-4">
                            <label for="nid_birth" class="col-form-label">
                                <select id="birth_nid" name="birth_nid" class="getbirthnid">
                                   <option value="nid" @if(old('birth_nid') == 'nid') selected="selected" @endif>এনআইডি নম্বর</option>
                                    <option value="birth_id_no" @if (old('birth_nid') == 'birth_id_no') selected="selected" @endif>জন্ম নিবন্ধন নম্বর</option>
                                </select>
                                <span style="color: red">*</span></label>
                            <input type="text" pattern="[0-9]+" min="1" name="nid" value="{{ old('nid') }}" class="form-control birth_nid" id="nid_birth"
                                   placeholder="এনআইডি নম্বর" required="">
                        </div>

                    </div><br>
                    <div class="row">

                        <div class="col-sm-4">
                            <label for="mobile" class="col-form-label">মোবাইল<span style="color: red">*</span></label>
                            <input type="text" oninput="contactNumber(this.id);" maxlength="11" name="mobilenumber" value="{{ old('mobilenumber') }}"  class="form-control mobilenumber" id="mobile" placeholder="মোবাইল" required="">
                            <span id="dupmobile" style="color: red;"></span>
                        </div>
                        <div class="col-sm-4">
                            <label for="ward_id" class="col-form-label">ওয়ার্ড নং</label>
                            <select name="ward_id" id="ward_id" class="form-control">
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @php
                                    $wards = DB::table('wards')->orderBy('id', 'DESC')->get();
                                @endphp
                                @foreach($wards as $ward)
                                    <option value="{{$ward->id}}" @if (old('ward_id') == $ward->id) selected="selected" @endif>{{$ward->ward_no}}</option>
                                @endforeach

                            </select>
                        </div>

                    </div><br>

                    <h5 style="padding-top: 15px"><u>ব্যবসার বিবরণ</u></h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="" class="col-form-label">প্রতিষ্ঠানের হোল্ডিং নং<span style="color: red">*</span></label>
                            <input type="text" name="holding_no" value="{{old('holding_no')}}" class="form-control" placeholder="প্রতিষ্ঠানের হোল্ডিং নং" required="">
                        </div>
                        <div class="col-sm-4">
                            <label for="" class="col-form-label">দোকান নং<span style="color: red">*</span></label>
                            <input type="text" name="shopno" value="{{old('shopno')}}" class="form-control" placeholder="দোকান নং" required="">
                        </div>
                        <div class="col-sm-4">
                            <label for="" class="col-form-label">প্রতিষ্ঠানের নাম<span style="color: red">*</span></label>
                            <input type="text" name="business_name" value="{{old('business_name')}}" class="form-control" placeholder="প্রতিষ্ঠানের নাম" id="" required="">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-4">
                            <label for="business_type" class="col-form-label">ব্যবসার ধরণ</label>
                            <select name="business_types" class="form-control" id="">
                                <option value="" selected="" disabled="">ব্যাবসার ধরন নির্বাচন করুন</option>
                                @foreach($business_types as $bt)
                                    <option value="{{$bt->id}}" @if (old('business_types') == $bt->id) selected="selected" @endif>{{$bt->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="photo" class="col-form-label">ছবি সংযুক্ত করুন</label>
                            <input type="file" id="photo" name="photo" onchange="loadFile(event)" class="form-control">
                            <span id="perror" style="color: red;"></span>
                        </div>
                        <div class="col-sm-4">
                            <img id="output" src="https://via.placeholder.com/150" class="img-responsive img-thumbnail img-fluid">
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

        $(document).on('change', '#ward_id', function () {
            var id = $(this).val();
            $.get('{{URL::to("getvillageinfo")}}' + '/' + +id, function (data) {
                if (data === 'no_data') {
                    $("#dupgram").text("উক্ত ওয়ার্ড এ কোনও গ্রাম আমাদের ডাটাবেসে নেই");
                    $("#setvillageid").html(
                        '<option value="" selected="" disabled="">নির্বাচন করুন</option>'
                    );
                } else {
                    $("#setvillageid").html(data);
                     $("#dupgram").text("");

                   
                }
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
@include ('frontend.include.footer')
