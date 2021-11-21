@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>সনদ আবেদন </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-fw ti-home"></i> ড্যাশবোর্ড
            </li>
            <li>সনদ আবেদনের তালিকা</li>
        </ol>
    </section>
@stop
@section('content')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- /.col -->
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <b style="font-size: 15px;"> সনদ আবেদনের তালিকা</b>

                                </div>
                                <table id="table1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>নং/সিরিয়াল</th>
                                        <th>নাম</th>
                                        <th>পরিচয়পত্র/জন্ম নিবন্ধন</th>
                                        <th>সনদ</th>
                                        <th>স্ট্যাটাস</th>

                                        <th>একশন</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all as $key=>$row)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->nid ?? $row->birth_certificate}}</td>
                                            <td>{{ $row->sonod_setting->title }}</td>

                                            @if($row->status == '1')
                                                <td>Approved</td>
                                            @else
                                                <td>Pending</td>
                                            @endif



                                            <td>
                                                @if($row->status == '0')
                                                    <a href="{{ route('sonod.approve', $row->id) }}" class="btn btn-success btn-sm">Approve</a>
                                                @else
                                                    <a  href="{{ route('sonod.pending', $row->id) }}" class="btn btn-danger btn-sm">Pending</a>

                                                @endif

{{--                                                <a href="{{URL::to('/view-nagorik/'.$row->id)}}" class="btn btn-info btn-sm">View</a>--}}
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                                <br>
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

@endsection
