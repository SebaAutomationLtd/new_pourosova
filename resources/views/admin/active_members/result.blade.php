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
                    <div class="col-sm-6">
                        <h4>সেবা কার্ড একটিভ প্যানেল</h4>
                    </div>

                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                সেবা কার্ড একটিভ প্যানেল
                            </div>

                            <div class="card-body">
                                @if (count($users) == 0)
                                    কোন তথ্য খুজে পাওয়া যায়নি
                                @else
                                    @foreach ($users as $user)
                                    @php
                                    $user_info = DB::table('users')->where('id',$user->user_id)->first();

                                    @endphp
                                        <table class="table table-hover table-bordered">
                                            <tr>
                                                <th>নাম</th>
                                                <th>ইউজার আইডি</th>
                                                <th>ওয়ার্ড</th>
                                                <th>স্টাটাস</th>
                                                <th>একশন</th>
                                            </tr>
                                            <tr>
                                                <td>{{  $user_info->name ?? '' }}</td>
                                                <td>{{ $user->user_id }}</td>
                                                <td>{{ $user->ward_id }}</td>
                                                <td>
                                                    @if($user->status == 1)
                                                    <span class="badge badge-success">একটিভ</span>
                                                    @else
                                                     <span class="badge badge-danger">ডিএকটিভ</span>
                                                     @endif 
                                                    </td>
                                                <td>
                                                    <a href="{{ route('action.show', [$user->id, $type]) }}"
                                                        class="btn btn-primary">বিস্তারিত দেখুন</a>  
                                                        @if ($user->status == 0)
                                                <a href="{{ route('action.activeshow', [$user->id, $type]) }}"
                                                    class="btn btn-success">একটিভ করুন</a>
                                            @else
                                                <a href="{{ route('action.deactivePanel', [$user->id, $type]) }}"
                                                    class="btn btn-danger">ডিএকটিভ করুন</a>
                                            @endif

                                            <a href="{{ route('action.edit', [$user->id, $type]) }}"
                                                        class="btn btn-info">এডিট করুন</a>

                                                </td>
                                            </tr>
                                        </table>
                                    @endforeach
                                @endif
                            </div>
                        </div>
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
