@extends('admin.layout.master')
@section('header')
<section class="content-header pl-3">
    <h1>এসেসমেন্ট নিবন্ধন</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="fa fa-fw ti-home"></i> ব্যাবসা প্রতিষ্ঠান

            </a>
        </li>
    </ol>
</section>
@stop
@section('content')

@php
$wards = DB::table('wards')->orderBy('id','DESC')->get();
$latest_ward = DB::table('wards')->orderBy('id','DESC')->first();

@endphp
<div class="card">
    <div class="card-header">
        <h3 class="h5"> ব্যাবসা প্রতিষ্ঠান নিবন্ধন টেবিল<a href=""
            class="btn btn-primary float-right"><i
            class="fa fa-download"></i> Download</a>
        </h3>
    </div>
    <div class="card-body">
        <div class="mb-3">
          <form action="{{URL::to('business-search-result')}}" method="get" id="bosottable">
             @csrf
             <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
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
            <div class="col-lg-3 col-md-3 col-sm-3">
                <input  class="form-control form-control-sm" type="text"
                name="nid" id="nid" placeholder="NID"
                aria-label="Recipient's ">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <input  class="form-control form-control-sm" type="text"
                name="mobile" id="mobile" placeholder=" মোবাইল নং"
                aria-label="Recipient's ">
            </div>

            <div class="col-lg-2 col-md-2 col-sm-2">
               <button  class="btn btn-success btn-sm member_search"><i
                class="fa fa-search"></i></button>
            </div>
        </div>

    </form>
</div>

<div class="table-responsive">
  <table
  class="table table-striped table-bordered datatable responsive nowrap table-hover yajra-datatable"
  style="width:98%">
  <thead>
    <tr> 
     <th>ক্রমিক নং</th>
     <th>নাম</th>
     <th>পিতা/স্বামীর নাম</th>
     <th>মোবাইল নং</th>
     <th>NID/জন্ম সনদ নং</th>
     <th>ইউজার আইডি</th>
     <th>ধরণ</th>
     <th>একশন</th>             
 </tr>
</thead>
<tbody>

</tbody>

</table>
</div>


</div>



</div>
</div>

<!-- Quick Edit Modal -->
<div class="modal fade" id="quick-edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="quick-edit-modal">কুইক এডিট করুন</h5>

            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn info-update btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Quick Edit Modal End -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $(document).on('change', '#ward_id', function () {
            var ward_id = $('#ward_id').val();
            $.ajax({
                url: "{{  url('/get-village_ward') }}",

                type: "GET",
                data: {'ward_id': ward_id},
                dataType: "html",
                success: function (data) {

                    $("#village_id").html(data);


                },

            });
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

            //Quick Edit
            $(document).on("click", ".quick-edit", function (e) {
                e.preventDefault();
                var id = $(this).data('id');

                $(".member_id").val(id);
                $('#quick-edit-modal').modal('show');

                $.ajax({
                    url: "{{ url('/get-businesss-info/') }}/" + id,
                    type: "GET",
                    dataType: "html",
                    success: function (data) {
                        $("#quick-edit-modal .modal-body").html(data);

                    },

                });
            });
            //Quick Edit


            $(document).on('click', '.info-update', function (e) {
                e.preventDefault();
                var name = $('.name').val();
                var user_id = $('.user_id').val();
                var password = $('.password').val();
                var id = $('.member_id').val();


                $.ajax({
                    url: "{{ url('update-business_info') }}",
                    type: "GET",
                    data: {
                        'id': id,
                        'name': name,
                        'user_id': user_id,
                        'password': password,

                    },
                    dataType: "html",
                    success: function (data) {

                        window.location.reload();
                        toastr.success("Successfully Informaton Updated");
                    },
                });
            });

        });
    </script>



    @endsection

    @section('js')

    <script>
        $(document).ready( function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('business-search-result') }}",
                    type: 'GET',
                    data: function (d) {
                      d.ward_id = $('#ward_id').val();
                      d.mobile = $('#mobile').val();
                      d.nid = $('#nid').val();
                  },
              },
              columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {data: 'father', name: 'father'},
              {data: 'mobile', name: 'mobile'},
              {data: 'nid', name: 'nid'},
              {data: 'user_id', name: 'user_id'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action', orderable: false, searchable: true},
              ],
              createdRow: function ( row, data, index ) {

                if ( data['status'] == '1' ) {
                    $('td', row).eq(6).html('<span class="badge badge-success">একটিভ</span>').css('text-align','center');
                } else {
                    $('td', row).eq(6).html(' <span class="badge badge-danger">পেন্ডিং</span>').css('text-align','center');
                };
            },
        });
        });
$('#bosottable').on('submit', function(e) {
    e.preventDefault();
    $('.yajra-datatable').DataTable().draw();

});
</script>
@endsection