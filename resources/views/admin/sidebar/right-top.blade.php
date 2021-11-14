@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">
                    <i class="fa fa-fw ti-home"></i> হেডার
                </a>
            </li>
            <li> লোগো</li>

        </ol>
    </section>
@stop


@section('content')
    <div class="row">

        <div class="col-sm-6 col-md-4">
            <div class="card main-chart mt-4 mt-md-0">
                <div class="card-header panel-tabs">
                    <h5>উপরের ব্যানার</h5>
                </div>
                <div class="card-body">
                    <img class="rounded d-block w-100" src="{{ asset('uploads/rightside/') }}/{{$top_banner ? $top_banner->photo : ''}}" alt="">
                    <a href="{{route('admin.web.right.top.edit',$top_banner->id)}}" class="btn btn-info btn-lg">এডিট করুন</a>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
<script type="text/javascript">
    document.forms['form'].elements['photo'].value    = [{{ old('photo') }}];
</script>
@stop



