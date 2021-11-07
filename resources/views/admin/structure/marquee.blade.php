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
        <div class="col-md-6">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>নিউজ স্ক্রোল পরিবর্তন</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.header.marquee') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">নিউজ টাইটেল</label>
                            <input type="text" name="title" class="form-control" required placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">নিউজ লিংক (যদি থাকে)</label>
                            <input type="text" name="link" class="form-control" placeholder="">
                        </div>
                        <button class="btn btn-primary">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card main-chart mt-4 mt-md-0">
                <div class="card-header panel-tabs">
                    <h5>নিউজ স্ক্রোল সমূহ</h5>
                </div>
                <div class="card-body">

                    @forelse($marquees as $marquee)
                        <div class="previous-notice mb-2">
                            <div class="d-flex">
                                <div class="mr-3">
                                    <i class="fa fa-fw fa-check-circle-o"></i>
                                </div>
                                <div>
                                    {{ $marquee->title }}
                                    <div>
                                        <small>{{ date('d-m-Y', strtotime($marquee->created_at)) }}</small>
                                    </div>
                                </div>

                                <div class="float-right">
                                     <a data-placement="left" title="ডিলেট করুন" data="tooltip"
                                        class="text-danger dropdown-item" href="{{ route('admin.header.marquee.delete',$marquee->id) }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse





                </div>
            </div>
        </div>

    </div>





@stop



