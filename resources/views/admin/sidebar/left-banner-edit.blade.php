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
        <div class="col-md-12">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>আপডেট বাম পাশের ব্যানার সমূহ</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web.left.banner.update',$left_banner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">শিরোনাম</label>
                            <input type="text" name="title" value="{{ $left_banner->title }}" class="form-control @error('title') is-invalid @enderror" placeholder="শিরোনাম" required>
                            @error('title')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">তথ্যের ধরন</label>
                            <select id="type" name="information_type" value="{{ $left_banner->information_type }}" class="custom-select @error('information_type') is-invalid @enderror" required>
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
                            <textarea class="form-control @error('description') is-invalid @enderror"  name="description" placeholder="বর্ণনা লিখুন" required>{{ $left_banner->description }}</textarea>
                            @error('description')
                                <small class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>     
                        <div class="form-group">
                            <label for="">300px * 300px এবং JPG ছবি</label><br>
                            <img src="{{ asset('leftside/img')}}/{{ $left_banner->photo}}" height="100px" width="200px">
                        </div>
                        <div id="banner" class="form-group">
                            <label for="">JPG ছবি </label>
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" id="customFileLang" lang="es">
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




