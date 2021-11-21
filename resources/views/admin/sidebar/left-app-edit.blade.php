@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> বাম সাইডবার
                </a>
            </li>
            <li> গুরুত্বপূর্ণ আবেদনপত্র</li>

        </ol>
    </section>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>আপডেট গুরুত্বপূর্ণ আবেদনপত্র</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web.left.app.update',$left_app->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">শিরোনাম</label>
                            <input type="text"  value="{{ $left_app->title }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="শিরোনাম" required>
                        </div>

                        <div class="form-group">
                            <label for="">লিঙ্ক</label>
                            <input type="text"  value="{{ $left_app->link }}" class="form-control @error('link') is-invalid @enderror" placeholder="লিঙ্ক" name="link" required>
                        </div>
                        <button type="submit" class="btn btn-primary">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop




