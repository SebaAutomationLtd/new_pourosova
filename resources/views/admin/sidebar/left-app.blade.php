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
        <div class="col-md-6">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>গুরুত্বপূর্ণ আবেদনপত্র</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web.left.app.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">শিরোনাম</label>
                            <input type="text"  value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="শিরোনাম" required>
                            @error('title')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">লিঙ্ক</label>
                            <input type="text"  value="{{ old('link') }}" class="form-control @error('link') is-invalid @enderror" placeholder="লিঙ্ক" name="link" required>
                            @error('link')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card main-chart mt-4 mt-md-0">
                <div class="card-header panel-tabs">
                    <h5>গুরুত্বপূর্ণ আবেদনপত্র</h5>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="table-data">
                            <table class="table table-striped table-bordered responsive nowrap table-hover"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th> ক্রমিক </th>
                                        <th>শিরোনাম</th>
                                        <th data-priority="2">লিঙ্ক সমূহ</th>
                                        <th>একশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($left_apps as $key=>$app)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $app->title ?? ''}}</td>
                                        <td>{{ $app->link  ?? ''}}</td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn  btn-outline-secondary btn-sm dropdown-toggle"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a data-placement="left" title="এডিট করুন" data="tooltip"
                                                            class="text-primary dropdown-item" href="{{ route('admin.web.left.left_app.edit',$app->id) }}">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a data-placement="left" title="ডিলেট করুন" data="tooltip"
                                                            class="text-danger dropdown-item" href="{{ route('admin.web.left.app.delete',$app->id) }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
<script type="text/javascript">
    document.forms['form'].elements['title'].value    = [{{ old('title') }}];
    document.forms['form'].elements['link'].value     = [{{ old('link') }}];
</script>
@stop



