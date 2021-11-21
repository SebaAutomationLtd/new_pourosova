@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>এসেসমেন্ট নিবন্ধন</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> বসতবাড়ী হোল্ডিং
                </a>
            </li>
            <!-- <li>সেবা কার্ড একটিভ প্যানেল</li> -->

        </ol>
    </section>
@stop
@section('content')

<div class="content-wrapper">
    <section class="content">
         <div class="container-fluid">
            <div class="row mb-2" style="margin-top: 20px;">
                    <div class="col-sm-6">
                        <h5>বসতবাড়ী হোল্ডিং নিবন্ধন পরিচালনা করুন </h5>
                    </div>
                   <!--  <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">হোম</a></li>
                            <li class="breadcrumb-item active"> বসতবাড়ী হোল্ডিং নিবন্ধন পরিচালনা করুন</li>
                        </ol>
                    </div> -->
                </div>
                @php
                         $wards = DB::table('wards')->orderBy('id','DESC')->get();
                         $latest_ward = DB::table('wards')->orderBy('id','DESC')->first();
                         $villages = DB::table('villages')
                              ->where('ward_id', $latest_ward->id)
                              ->orderBy('villages.id', 'DESC')
                              ->get();
                        @endphp
           <div class="row">
              <div class="col-md-12">
                 <div class="card card-warning">
                     <div class="card">
                         <div class="card-header">
                                    <h3 class="card-title"> বসতবাড়ী হোল্ডিং নিবন্ধন <a href=""
                                            class="btn btn-primary float-right"><i class="fa fa-download"></i> Download</a>
                                    </h3>
                                </div>
                        <div class="card-body">
                            <div class="mb-3">
                            
                               <form action="{{URL::to('/bosot-search-result')}}" method="get" id="bosottable">
                                   @csrf
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                        <select id="ward_id"
                                                    name="ward_id"
                                                    class="form-control form-control-sm">
                                                    <option value="" disabled selected>ওয়ার্ড
                                                    </option>
                                                    @foreach ($wards as $ward)
                                                        <option value="{{$ward->id}}">{{ $ward->ward_no }}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                         <select name="village_id" id="village_id"
                                                    class="form-control form-control-sm">
                                                    <option value="" selected="" disabled="">গ্রাম
                                                    </option>
                                                    
                                                </select>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                        <input  class="form-control form-control-sm" type="text"
                                                name="mobile" id="mobile" placeholder="মোবাইল ..."
                                                aria-label="Recipient's ">
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                        <input class="form-control form-control-sm" type="text"
                                                name="nid" id="nid" placeholder="NID">
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                         <input class="form-control form-control-sm" type="text"
                                                name="holding_no" id="holding_no" placeholder="হোল্ডিং নং ..."
                                                aria-label="Recipient's ">
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                         <button  class="btn btn-success btn-sm member_search"><i
                                                        class="fa fa-search"></i></button>
                                    </div>
                                   <!--  <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <select style="width: 75px;" id="ward_id"
                                                    style="border-radius: .25rem 0 0 .25rem;" name="ward_id"
                                                    class="form-control form-control-sm">
                                                    <option value="" disabled selected>ওয়ার্ড
                                                    </option>
                                                    @foreach ($wards as $ward)
                                                        <option value="{{$ward->id}}">{{ $ward->ward_no }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group-prepend">
                                                <select style="width: 70px;" style="border-radius: 0;"
                                                    name="village_id" id="village_id"
                                                    class="form-control form-control-sm">
                                                    <option value="" selected="" disabled="">গ্রাম
                                                    </option>
                                                    
                                                </select>
                                            </div>

                                             <input style="width: 70px;" class="form-control form-control-sm" type="text"
                                                name="mobile" id="mobile" placeholder="মোবাইল ..."
                                                aria-label="Recipient's ">


                                           <input style="width: 60px;" class="form-control form-control-sm" type="text"
                                                name="nid" id="nid" placeholder="NID">


                                            <input style="width: 50px;" class="form-control form-control-sm" type="text"
                                                name="holding_no" id="holding_no" placeholder="হোল্ডিং নং ..."
                                                aria-label="Recipient's ">

                                            <div class="input-group-append">
                                                <button  class="btn btn-success btn-sm member_search"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                          </form>
                                        
                                      
                            </div>
                        </div>
                     </div>
                 </div> 
                  
              </div> 
               
           </div>
        </div>
    </section>
    
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
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
   //  $(document).ready(function(){
   //       $(document).on('change', '#ward_id', function(){
   //    var ward_id = $('#ward_id').val();
   //    $.ajax({
   //       url: "{{  url('/getvillageinfo') }}",

   //       type:"GET",
   //       data:{'ward_id':ward_id},
   //       dataType:"html",
   //       success:function(data) {
             
   //            $("#village_id").html(data);
          
            
            
            
   //       },
        
   //     });
   // });
   
  
                
        //  $(document).on('click', '.member_search', function(e){
        //      e.preventDefault();
        //      var ward_id = $("#ward_id").val();
        //      var village_id = $("#village_id").val();
        //      var nid = $("#nid").val();
        //      var mobile = $("#mobile").val();
        //      var holding_no = $("#holding_no").val();
        //      $.ajax({
        //                 url: "{{ url('/bosot-search-result') }}",
        //                 type: "GET",
        //                 data:{'ward_id':ward_id,'village_id':village_id, 'nid':nid, 'mobile':mobile,'holding_no':holding_no},
        //                 dataType: "html",
        //                 success: function(data) {
        //                     alert(data);
        //                 },
        //             });
        //  });
    // });
</script>

@endsection