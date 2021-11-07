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
                    <h5>নোটিশ</h5>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="btn btn-primary">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.web.notice.download.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">শিরোনাম</label>
                                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="শিরোনাম" value="{{ old('title') }}">
                                @error('title')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label for="">নোটিশের ধরন</label>
                                <select  name="notice_type" class="custom-select @error('notice_type') is-invalid @enderror">
                                    <option value="" selected disabled>-- সিলেক্ট করুন --</option>
                                    <option value="1">ফরম</option>
                                    <option value="2">সিটিজেন চার্টার</option>
                                    <option value="3">এক নজরে</option>
                                </select>
                                @error('notice_type')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label for="">প্রকাশনা</label>
                                <select name="publication" class="custom-select @error('publication') is-invalid @enderror">
                                    <option value="" selected disabled>-- সিলেক্ট করুন --</option>
                                    <option value="1">প্রকাশ করুন</option>
                                    <option value="2">পরবর্তিতে প্রকাশ করুন</option>
                                </select>
                                @error('publication')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">ফাইল আপলোড করুন </label>
                            <div class="custom-file">
                                <input name="photo" type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="customFileLang" lang="es">
                                <label class="custom-file-label" for="customFileLang">ফাইল আপলোড </label>
                                @error('photo')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card main-chart mt-4 mt-md-0">
                <div class="card-header panel-tabs">
                    <h5>প্রকাশিত নোটিশ</h5>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="table-data">
                            <table id="notice" class="table table-striped table-bordered responsive nowrap table-hover"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th> ক্রমিক </th>
                                        <th data-priority="1">শিরোনাম</th>
                                        <th>নোটিশের ধরন</th>
                                        <th>প্রকাশনা</th>
                                        <th>একশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($downloads as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>@if($item->notice_type==1) ফরম @elseif ($item->notice_type==2) সিটিজেন চার্টার @elseif ($item->notice_type==3) এক নজরে @endif</td>
                                        <td>@if($item->publication==1) প্রকাশ করুন @elseif ($item->publication==2) পরবর্তিতে প্রকাশ করুন @endif</td>
                                        
                                        <td>
                                                <a data-placement="
                                                    " title="ডিলেট করুন"
                                                    data="tooltip" class="text-danger"
                                                    href="{{route('admin.web.notice.download.delete', $item->id ?? '')}}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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
    document.forms['form'].elements['title'].value          = [{{ old('title') }}];
    document.forms['form'].elements['notice_type'].value    = [{{ old('notice_type') }}];
    document.forms['form'].elements['publication'].value    = [{{ old('publication') }}];
    document.forms['form'].elements['photo'].value          = [{{ old('photo') }}];
</script>
@stop

