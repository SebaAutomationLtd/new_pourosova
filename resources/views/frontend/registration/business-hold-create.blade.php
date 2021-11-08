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
                <form role="form" action="{{route('reg.business-store')}}" method="post">
                    @csrf
                    <h5 style="padding-top: 15px"><u>খানা প্রধানের তথ্য</u></h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="name" class="col-form-label">নাম <span style="color: red">*</span></label>
                            <input type="text" name="name" oninput="fullName(this.id);" maxlength="100" value="{{ old('name') }}" class="form-control" id="name" placeholder="নাম" required="">
                        </div>
                        <div class="col-sm-4" id="father_name">
                            <label for="father_name" class="col-form-label">
                                <select id="gurdian_status" name="gurdian_status" required="">
                                   <option  value="father" @if (old('gurdian_status') == 'father') selected="selected" @endif>পিতার নাম </option>
                                    <option  value="husband" @if (old('gurdian_status') == 'husband') selected="selected" @endif>স্বামীর নাম</option>
                                </select>
                                <span style="color: red">*</span></label>
                            <input type="text" name="father_name" value="{{ old('father_name') }}" class="form-control gurdian_status" id="father_name" placeholder="পিতার নাম " required="">
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
                            <input type="text" oninput="contactNumber(this.id);" maxlength="11" class="form-control mobilenumber" name="mobilenumber" id="mobile"
                                   placeholder="মোবাইল" value="{{ old('mobilenumber') }}" required="">
                        </div>


                    </div>

                    <h5><u>ঠিকানার তথ্য</u> </h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="ward_id" class="col-form-label">ওয়ার্ড নং <span style="color: red">*</span></label>
                            <select name="ward_id" id="ward_id" class="form-control" required="">
                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                @foreach ($wards as $ward)
                                    <option value="{{ $ward->id }}" @if (old('ward_id') == $ward->id) selected="selected" @endif>{{ $ward->ward_no }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="holding_no" class="col-form-label">হোল্ডিং নং <span
                                    style="color: red">*</span> </label>
                            <input type="text" name="holding_no"  class="form-control"
                                   id="holding_no" value="{{old('holding_no')}}" placeholder="হোল্ডিং নং" required="">
                        </div>
                        <div class="col-sm-4-">
                            <label for="number_room" class="col-form-label">রুম পরিমাণ <span style="color: red">*</span></label>
                            <input type="number" min="1" name="total_room" value="{{old('total_room')}}" class="form-control"
                                   id="total_room" placeholder="রুম পরিমাণ"
                                   required="">
                        </div>
                    </div><br>

                    <h5><u>স্টল তথ্য</u> </h5>
                    <div class="row">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped ml-3" id="stallSection">
                            <thead>
                                <tr>
                                    <td>স্টল নং</td>
                                    <td>ভাড়ার ধরন</td>
                                    <td>ভাড়াটিয়ার এন আই ডি</td>
                                    <td>জন্মতারিখ</td>
                                    <td>মোবাইল</td>
                                    <td>ভাড়া</td>
                                    <td>বার্ষিক ট্যাক্স</td>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
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

<script>
    $('#total_room').on('change', function (e) {
        e.preventDefault();
        var totalRoom = $('#total_room').val();
        var holdingNo = $('#holding_no').val();

        if (holdingNo && totalRoom) {
            var stallInfo = "";
            for (let i = 1; i <= totalRoom; i++) {
                stallInfo += '<tr id="stall_'+i+'">' +
                    '<td width="10%"><input class="form-control" type="text" name="stall_no[]" readonly value="'+holdingNo+'/'+i+'"></td>' +
                    '<td width="12%"><select id="ownership_'+i+'" name="ownership[]" class="form-control"><option value="self">নিজের</option><option value="rent">ভাড়া</option></select></td>' +
                    '<td width="20%"><input class="form-control" name="stall_nid[]" type="number" maxlength="20"></td>' +
                    '<td width="20%"><input class="form-control" name="stall_date[]" type="date"></td>' +
                    '<td width="20%%"><input class="form-control" name="stall_phone[]" type="number" maxlength="11"></td>' +
                    '<td width="10%"><input class="form-control" id="rent_'+i+'" onkeyup="calculateRent('+i+')" name="stall_rent[]" type="number"></td>' +
                    '<td width="10%"><input class="form-control" id="tax_'+i+'" name="stall_tax[]" readonly type="number"></td>' +
                    '</tr>'
            }
            $('#stallSection tbody').empty();
            $('#stallSection tbody').append(stallInfo);
        }
    });
function calculateRent(id){
    var ownership = $("#ownership_"+id).val();
    if(ownership == 'self')
    {
        var rent = parseFloat($("#rent_"+id).val() * 10 * .10);
        $("#tax_"+id).val(rent);


    }else if(ownership == 'rent')
    {
        var rent = parseFloat($("#rent_"+id).val() * 12 * .10);
        $("#tax_"+id).val(rent);
    }

}



</script>


@include ('frontend.include.footer')


