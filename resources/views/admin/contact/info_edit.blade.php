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
                    <h5>আপডেট তথ্য ও পরিষেবা কেন্দ্র</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web.contact.info.update',$info_edit->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">শিরোনাম</label>
                                <input type="text" class="form-control" value="{{ $info_edit->title }}" name="title" placeholder="শিরোনাম" required>
                               @error('title')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">তথ্যের ধরন</label>
                                <select id="type" class="custom-select" name="info_type" required>
                                    <option value="1">ছবি</option>
                                    <option value="2">বর্ণনা</option>
                                </select>
                                @error('info_type')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div id="desc" class="form-group">
                            <label for="">বর্ণনা লিখুন</label>
                            <textarea name="description" id="summernote" placeholder="বর্ণনা লিখুন" required>{{ $info_edit->description}}</textarea>
                                @error('description')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                        </div>
                        <div id="banner" class="form-group">
                            <label for="">JPG ছবি </label><br>
                            <img src="{{ asset('info/img') }}/{{ $info_edit->photo }}" height="100px" width="60px" required>
                            
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
    </div>


@stop
@section('js')
<script type="text/javascript">
    document.forms['form'].elements['title'].value          = [{{ old('title') }}];
    document.forms['form'].elements['info_type'].value    = [{{ old('info_type') }}];
    document.forms['form'].elements['description'].value    = [{{ old('description') }}];
    document.forms['form'].elements['photo'].value          = [{{ old('photo') }}];
</script>
@stop


