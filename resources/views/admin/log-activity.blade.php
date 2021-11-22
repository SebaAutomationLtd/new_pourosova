@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1> লগ একটিভিটি</h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-fw ti-home"></i> ড্যাশবোর্ড
            </li>
            <li>লগ একটিভিটি</li>
        </ol>
    </section>
@stop
@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card main-chart ">
                        <div class="card-header panel-tabs">
                            <h4 style="display: inline-block">লগ একটিভিটি টেবিল</h4>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="table-data">
                                    <table
                                        class="table table-striped table-bordered datatable responsive nowrap table-hover"
                                        style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>সিরিয়াল</th>
                                            <th>রেকর্ড</th>
                                            <th>সময় </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($all_activity as $index => $activity)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $activity->causer->name }} {{ $activity->description }} a {{ substr($activity->subject_type, 11) }}</td>
                                                    <td>{{ $activity->created_at }}</td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
