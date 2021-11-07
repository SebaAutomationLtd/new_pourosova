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
                    <h5>তথ্য ও পরিষেবা কেন্দ্র</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web.contact.info.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">শিরোনাম</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="শিরোনাম">
                               @error('title')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">তথ্যের ধরন</label>
                                <select id="type" class="custom-select @error('info_type') is-invalid @enderror" name="info_type">
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
                            <textarea name="description" id="summernote" placeholder="বর্ণনা লিখুন" class="@error('description') is-invalid @enderror"></textarea>
                                @error('description')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
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

        <div class="col-md-12 mt-4">
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
                                        <th>তথ্য</th>
                                        <th>একশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>
                                            ডিজিটাল দিবস
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{ asset('Front') }}/images//photos/mayor.jpg">
                                                <img class="rounded" src="{{ asset('Front') }}/images//photos/mayor.jpg"
                                                    alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn  btn-outline-secondary btn-sm dropdown-toggle"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a data-placement="left" title="এডিট করুন" data="tooltip"
                                                        class="text-primary dropdown-item" href="#">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a data-placement="left" title="ডিলেট করুন" data="tooltip"
                                                        class="text-danger dropdown-item" href="#">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>


                                                </div>
                                            </div>

                                        </td>
                                    </tr>

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
    document.forms['form'].elements['title'].value          = [{{ old('title') }}];
    document.forms['form'].elements['info_type'].value    = [{{ old('info_type') }}];
    document.forms['form'].elements['description'].value    = [{{ old('description') }}];
    document.forms['form'].elements['photo'].value          = [{{ old('photo') }}];
</script>
@stop


