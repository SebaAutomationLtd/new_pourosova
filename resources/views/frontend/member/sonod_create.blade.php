@extends('frontend.member.member_master')
@section('member_content')



                  <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="dashboard-body">
                        <div class="content-header">
                            {{ $title }} এর আবেদন
                        </div>
                        <div class="content py-5">
                               @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
                            <div class="form-row sonod">

                <form action="{{ $id =='8' ? route('trade.store') : route('sonod.store') }}" method="post"  enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="sonod_setting_id" value="{{ $id }}">
                    @if($id==8)
                       @php
                         $business_types = DB::table('business_types')->where('status', 1)->get();
                         $user = DB::table('business')->where('user_id', Auth::user()->id)->first();
                         $user_info = DB::table('users')->where('id', Auth::user()->id)->first();
                               $wards = DB::table('wards')->where('status', 1)->get();
                        @endphp
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for=""> প্রতিষ্ঠানের নাম</label>
                                <input name="business_name" type="text" value="{{ old('business_name',$user->business_name) }}" class="form-control" placeholder="প্রতিষ্ঠানের নাম"> 
                        </div>

                        <div class="col-md-6 mb-3">
                             <label for="">ব্যবসার ধরণ</label>
                               <select id="business_type_id" name="business_type_id" class="form-control">
                                                <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                 @foreach ($business_types as $businesst)
                                                        <option value="{{ $businesst->id }}" {!! old('business_type_id', $user->business_type_id ) == $businesst->id ? 'selected="selected"' : '' !!}>
                                                            {{ $businesst->name }}</option>
                                                    @endforeach
                                            </select>
                        </div>
                    </div>


                    @endif

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for=""> @if ($id == 5) মৃত ব্যক্তির @elseif($id==8) মালিকের  @endif নাম</label>
                                <input name="name" value="{{$user_info->name ?? ''}}" required type="text" class="form-control" placeholder="সম্পূর্ণ নাম">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="mb-1">
                                    <select id="gurdian_status" name="gurdian_status">
                                                <option {!! old('gurdian_status', $user->spouse) == null ? 'selected="selected"' : '' !!}  value="father" >পিতার নাম </option>
                                                <option {!! old('gurdian_status', $user->father) == null ? 'selected="selected"' : '' !!} value="husband" >স্বামীর নাম</option>
                                            </select>
                                </label>
                                @if($id == 8)
                                 @if ($user->spouse == null)
                                            <input type="text" name="father_name" value="{{old('father_name', $user->father) }}"
                                                class="form-control gurdian_status" id="father_name" autocomplete="off"
                                                placeholder="পিতার নাম " >

                                            @else
                                            <input type="text" name="father_name" value="{{ old('father_name',$user->spouse) }}"
                                                class="form-control gurdian_status" id="husband_name" autocomplete="off"
                                                placeholder="স্বামীর নাম " >

                                        @endif
                                        @else
                                <input required name="father" type="text" class="form-control guardian_val" placeholder="পিতার নাম">
                                @endif

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">মাতার নাম</label>
                                <input required name="mother" value="{{$user->mother ?? ''}}" type="text" class="form-control" placeholder="মাতার নাম">
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="mb-1">
                                    <select class="birth_nid" name="birth_nid">
                                          <option {!! old('birth_nid', $user->birth_certificate) == null ? 'selected="selected"' : '' !!} value="nid">জাতীয় পরিচয়পত্র নং</option>
                                                <option value="birth_id_no" {!! old('birth_nid', $user->nid) == null ? 'selected="selected"' : '' !!}>জন্ম নিবন্ধন নম্বর</option>
                                    </select>
                                </label>
                                @if($id==8)
                                  @if ($user->birth_certificate == null)
                                            <input type="text" name="nid" value="{{ old('nid',$user->nid) }}"
                                                class="form-control birth_nid" id="nid_birth" autocomplete="off"
                                                placeholder="এনআইডি নম্বর" required="">


                                        @else
                                            <input type="text" name="nid"
                                                value="{{ old('nid',$user->birth_certificate) }}" class="form-control birth_nid"
                                                id="nid_birth" autocomplete="off" placeholder="এনআইডি নম্বর" required="">

                                               

                                        @endif
                                @else
                                <input required type="text" name="nid" class="form-control val_birth_nid"
                                    placeholder="জাতীয় পরিচয়পত্র নং">
                                    @endif
                            </div>
                        </div>
                        @if ($id != 8)
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">জন্ম তারিখ</label>
                                <input type="date" class="form-control" name="dob">
                            </div>
                        </div>
                        @else
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">মোবাইল নং </label>
                                <input type="text" pattern="[0-9]+" oninput="contactNumber(this.id);" maxlength="11" value="{{$user->mobile??''}}" class="form-control mobilenumber" name="mobile">
                                  <span id="dupmobile" style="color: red;"></span>
                            </div>
                        </div>

                        @endif
                        @if ($id == 1)

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">মৃত্যুর তারিখ</label>
                                    <input type="date" class="form-control" name="dod">
                                </div>
                            </div>
                        @endif

                         

                    </div>
                    <div class="form-row">
                        @if ($id == 8)
                          <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">ওয়ার্ড নং</label>
                                   <select name="ward_id" id="ward_id" class="form-control"  >
                                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                   
                                                    @foreach ($wards as $ward)
                                                    <option value="{{ $ward->id }}"{!! old('ward_id', $user->ward_id ) == $ward->id ? 'selected="selected"' : '' !!}>
                                                            {{ $ward->ward_no }}</option>
                                                    @endforeach
                                                </select>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">মহল্লা</label>
                                       <input type="text" name="road_moholla" value="{{ old('road_moholla',$user->road_moholla) }}"
                                                    class="form-control" id="road_moholla" placeholder="মহল্লা "
                                                    autocomplete="off" >
                                </div>
                            </div>


                         @endif
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">  @if ($id == 8) 
ব্যবসা প্রতিষ্ঠানের @endif ঠিকানা</label>
                                <textarea required name="address" class="form-control"
                                    placeholder="ঠিকানা"></textarea>
                            </div>
                        </div>

                    </div>
                    @if ($id == 8) 
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for=""> মালিকের বর্তমান ঠিকানা </label>
                             <textarea class="form-control" name="current_address" placeholder="বর্তমান ঠিকানা  "
                                                    autocomplete="off" required="">{{ old('current_address',$user->current_address) }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for=""> মালিকের স্থায়ী ঠিকানা </label>
                            <textarea class="form-control" name="permanent_address" placeholder="স্থায়ী ঠিকানা  "
                                                    autocomplete="off" required="">{{ old('permanent_address',$user->permanent_address) }}</textarea>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">ছবি</label>
                            <input type="file" id="photo" name="photo" onchange="loadFile(event)" class="form-control">
                            <span id="perror" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                  <img id="output" src="@if($user->photo) {{asset('img/'.$user->photo)}} @else https://via.placeholder.com/150 @endif" width="120" class="img-responsive img-thumbnail img-fluid">
                            </div>
                        </div>

                    </div>

                    @endif
                    @if ($id == 5)
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="mb-3">
                           <table class="table" style="background: green">
            <thead>
              <tr>
                <th style="color: white;">উত্তরাধীকারীগনের নাম</th>
                <th style="color: white;">সম্পর্ক</th>
                 <th style="color: white;">NID</th>
                 <th style="color: white;">মন্তব্য</th>
                 <th><button type="button" style="padding: 3px; color: white;" class="btn btn-warning btn-sm add_more"><i class="fa fa-plus"></i></button></th>
              </tr>

            </thead>

            <tbody>

            </tbody>

          </table>
                            </div>
                        </div>

                    </div>
                    @endif
                    <div class="text-right">
                        <button type="submit" id="showSubmitButton" class="btn btn-primary">সাবমিট করুন</button>
                    </div>
                </form>

            </div>

                        </div>
                    </div>
                </div>
<script>
 $(document).ready(function(){

    $(document).on('change', '.guardian_status', function(){
        var guardian_status = $('.guardian_status').val();


        if(guardian_status == 'father'){
            $('.guardian_val').attr('placeholder', 'পিতার নাম');
             $('.guardian_val').attr('name', 'father');
        }
        else{
            $('.guardian_val').attr('placeholder', 'স্বামীর নাম');
            $('.guardian_val').attr('name', 'husband');
        }

    });

    $(document).on('change', '.birth_nid', function(){
        var birth_nid = $('.birth_nid').val();

        if(birth_nid == 'birth_certificate'){
            $('.val_birth_nid').attr('placeholder', 'জন্ম নিবন্ধন নম্বর');
             $('.val_birth_nid').attr('name', 'birth_certificate');
        }
        else{
            $('.val_birth_nid').attr('placeholder', 'এনআইডি নম্বর');
             $('.val_birth_nid').attr('name', 'nid');
        }

    });

   $(document).on('click', '.add_more', function(e){
       e.preventDefault();
       Tbody();
   });

   $(document).on("click", ".remove", function(e){
       e.preventDefault();


         $(this).parent().parent().remove();


    });

    $(document).on('input', '.warsh_check', function(){
        $('.check').val('1')
    });
 });


 function Tbody()
   {
      var tr =

         '<tr>'+
         '<td><input  type="text" name="warish_member_name[]" class="form-control warsh_check"></td>'+

         '<td><select name="relation[]" class="form-control"><option value="" selected="" disabled>সম্পর্ক</option><?php $rel = DB::table('relations')->get(); ?>@foreach($rel as $row)<option value="{{$row->relation_name}}">{{$row->relation_name}}</option>@endforeach</select></td>'+

          '<td><input type="text" name="member_nid[]" class="form-control"></td>'+

        '<td><input  type="text" name="comment[]" class="form-control"></td>'+




         '<td><a style="cursor: pointer;" class="btn btn-danger btn-sm remove">X</a></td>'+


       '</tr>';



       $('tbody').append(tr);
   }


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
</script>
<script>
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


