@extends('frontend.member.member_master')
@section('member_content')



                  <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="dashboard-body">
                        <div class="content-header">
                            {{ $title }} এর আবেদন
                        </div>
                        <div class="content py-5">
                            <div class="form-row sonod">

                <form action="{{ route('sonod.store') }}" method="post">
                    @csrf

                    <input type="hidden" name="sonod_setting_id" value="{{ $id }}">

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for=""> @if ($id == 5) মৃত ব্যক্তির @endif নাম</label>
                                <input name="name" required type="text" class="form-control" placeholder="সম্পূর্ণ নাম">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="mb-1">
                                    <select class="guardian_status">
                                        <option value="father">পিতার নাম</option>
                                        <option value="husband">স্বামীর নাম</option>
                                    </select>
                                </label>
                                <input required name="father" type="text" class="form-control guardian_val" placeholder="পিতার নাম">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">মাতার নাম</label>
                                <input required name="mother" type="text" class="form-control" placeholder="মাতার নাম">
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="mb-1">
                                    <select class="birth_nid">
                                        <option value="nid">জাতীয় পরিচয়পত্র নং</option>
                                        <option value="birth_certificate">জন্ম নিবন্ধন সনদ নং</option>
                                    </select>
                                </label>
                                <input required type="text" name="nid" class="form-control val_birth_nid"
                                    placeholder="জাতীয় পরিচয়পত্র নং">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">জন্ম তারিখ</label>
                                <input type="date" class="form-control" name="dob">
                            </div>
                        </div>
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
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">ঠিকানা</label>
                                <textarea required name="address" class="form-control"
                                    placeholder="ঠিকানা"></textarea>
                            </div>
                        </div>

                    </div>
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
                        <button type="submit" class="btn btn-primary">সাবমিট করুন</button>
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
@endsection


