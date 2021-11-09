@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> এসেসমেন্ট নিবন্ধন
                </a>
            </li>
            <!-- <li>সেবা কার্ড একটিভ প্যানেল</li> -->

        </ol>
    </section>
@stop
@section('content')

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2" style="margin-top: 20px">

                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header ">
                                <h4>নতুন গ্রাম যোগ করুন</h4>
                            </div><!-- /.card-header -->
                            <div class="container col-lg-4">

                            </div>
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="active tab-pane" id="settings"><br><br>
                                        <form action="{{ route('action.active') }}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">সেবা কার্ড নম্বর
                                                    <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-7">
                                                    <input required type="text" name="user_id"
                                                        value="{{ $user->user_id }}" class="form-control">

                                                </div>
                                            </div>
                                            <input type="hidden" name="user_id_old" value="{{ $user->user_id }}">
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <input type="hidden" name="type" value="{{ $type }}">
                                            <input type="hidden" name="mobile" value="{{ $user->mobile }}">


                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">পিন নম্বর
                                                    <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-7">
                                                    <input required type="text" value="12345678" name="password"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">একশন
                                                    <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-7">
                                                    <select required class="form-control" name="status" id="">
                                                        <option value="">নির্বাচন করুন</option>
                                                        <option {{ $user->status == 0 ? 'selected' : '' }} value="1">একটিভ
                                                        </option>
                                                        <option {{ $user->status == 1 ? 'selected' : '' }} value="0">
                                                            ডিএকটিভ</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">সেবা কার্ড চার্জ
                                                    <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="charge" readonly class="form-control"
                                                        value="150">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">পেমেন্ট মেথড
                                                    <span style="color: red">*</span>
                                                </label>
                                                <div class="col-sm-7">
                                                    <select name="payment_type" id="payment_type" class="form-control"
                                                        required>
                                                        <option value="" selected disabled>নির্বাচন করুন</option>
                                                        <option {{ $user->payment_method_id  == 1 ? 'selected' : '' }}
                                                            value="1">নগদ
                                                        </option>
                                                        <option {{ $user->payment_method_id  == 4 ? 'selected' : '' }}
                                                            value="4">
                                                            ব্যাংক</option>
                                                        <option {{ $user->payment_method_id  == 2 ? 'selected' : '' }}
                                                            value="2">
                                                            বিকাশ</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success">একটিভ করুন</button>
                                                </div>
                                            </div>
                                        </form><br><br>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
