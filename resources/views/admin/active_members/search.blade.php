@extends('admin.layout.master')
@section('header')
<section class="content-header pl-3">
    <h1>এসেসমেন্ট নিবন্ধন</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="fa fa-fw ti-home"></i> একটিভ / ডিএকটিভ প্যানেল
            </a>
        </li>
        <!-- <li>    একটিভ / ডিএকটিভ</li> -->

    </ol>
</section>
@stop
@section('content')

<div class="card">
    <div class="card-header ">
        <h4 class="h5">একটিভ / ডিএকটিভ প্যানেল</h4>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content">

            <div class="active tab-pane" id="settings"><br><br>
                <form action="{{ route('action.search') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">ধরণ
                            <span style="color: red">*</span>
                        </label>
                        <div class="col-sm-7">
                            <select required class="form-control" name="type" id="">
                                <option value="">--Select--</option>
                                <option value="1">বসতবাড়ি</option>
                                <option value="2">বাণিজ্যিক</option>
                                <option value="3">ব্যাবসা প্রতিষ্ঠান</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="storeId" class="col-sm-2 col-form-label">ওয়ার্ড
                            <span style="color: red">*</span>
                        </label>
                        <div class="col-sm-7">
                            <select required class="form-control" name="ward_id" required>
                                <option value="">ওয়ার্ড নির্বাচন করুন</option>
                                @php
                                $wards = DB::table('wards')
                                ->orderBy('id', 'ASC')
                                ->get();
                                @endphp
                                @foreach ($wards as $row)
                                <option value="{{ $row->id }}">{{ $row->ward_no }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">NID / জন্ম নিবন্ধন /
                            ফোন
                            নম্বর
                            <span style="color: red">*</span>
                        </label>
                        <div class="col-sm-7">
                            <input required type="text" name="contact" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-success">খুজুন</button>
                        </div>
                    </div>
                </form><br><br>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div><!-- /.card-body -->
</div>

@endsection
