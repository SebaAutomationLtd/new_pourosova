@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> ডান সাইডবার
                </a>
            </li>
            <li> গুরুত্বপূর্ণ আবেদনপত্র</li>

        </ol>
    </section>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>আপডেট গুরুত্বপূর্ণ আবেদনপত্র</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web.right.links.update',$right_link->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">শিরোনাম</label>
                            <input type="text" value="{{ $right_link->title }}" class="form-control" name="title" placeholder="শিরোনাম">
                            @error('title')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">লিঙ্ক</label>
                            <input type="text" value="{{ $right_link->link}}" class="form-control " placeholder="লিঙ্ক" name="link">
                        </div>
                        <button class="btn btn-primary">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

