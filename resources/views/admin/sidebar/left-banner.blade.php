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
                    <h5>বাম পাশের ব্যানার সমূহ</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web.left.banner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">শিরোনাম</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="শিরোনাম" required>
                            @error('title')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">তথ্যের ধরন</label>
                            <select id="type" name="information_type" value="{{ old('information_type') }}" class="custom-select @error('information_type') is-invalid @enderror" required>
                                <option value="1">ছবি</option>
                                <option value="2">বর্ণনা</option>
                            </select>
                            @error('information_type')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div id="desc" class="form-group">
                            <label for="">বর্ণনা লিখুন</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"  name="description" placeholder="বর্ণনা লিখুন" required>{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>

                        <div id="banner" class="form-group">
                            <label for="">JPG ছবি </label>
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" id="customFileLang" lang="es" required>
                                <label class="custom-file-label" for="customFileLang">ছবি (JPG Format)</label>
                                @error('photo')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card main-chart mt-4 mt-md-0">
                <div class="card-header panel-tabs">
                    <h5>বাম পাশের ব্যানার সমূহ</h5>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="table-data">
                            <table class="table table-striped table-bordered responsive nowrap table-hover"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th> ক্রমিক </th>
                                        <th data-priority="1">শিরোনাম</th>
                                        <th>তথ্যের ধরন</th>
                                        <th>বর্ণনা</th>
                                        <th>ছবি</th>
                                        <th>একশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($left_banners as $key=>$banner)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $banner->title }}</td>
                                        <td>
                                            @if($banner->information_type==1)ছবি @elseif($banner->information_type==2) বর্ণনা @endif
                                        </td>
                                        <td>{{ $banner->description }}</td>
                                        <td>
                                            <a target="_blank" href="{{ asset('Front') }}/images//photos/mayor.jpg">
                                            <img class="rounded" src="{{ asset('leftside/img') }}/{{$banner->photo}}"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn  btn-outline-secondary btn-sm dropdown-toggle"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a href="{{ route('admin.web.left.banner.edit',$banner->id)}}" data-placement="left" title="এডিট করুন" data="tooltip"
                                                        class="text-primary dropdown-item" href="#">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a data-placement="left" title="ডিলেট করুন" data="tooltip"
                                                        class="text-danger dropdown-item" href="{{ route('admin.web.left.banner.delete',$banner->id)}}">
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
    document.forms['form'].elements['title'].value              = [{{ old('title') }}];
    document.forms['form'].elements['information_type'].value   = [{{ old('information_type') }}];
    document.forms['form'].elements['description'].value        = [{{ old('description') }}];
    document.forms['form'].elements['photo'].value              = [{{ old('photo') }}];
</script>
@stop




