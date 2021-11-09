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
                    <form action="{{route('admin.web.notice.notice.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="">শিরোনাম</label>
                                <input name="title" type="text" required class="form-control" placeholder="">
                                <input type="hidden" value="{{ old('title') }}" value="notice" name="type">
                                @error('title')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label for="">নোটিশের ধরন</label>
                                <select name="type" required id="type" class="custom-select">
                                    <option value="">-- সিলেক্ট করুন --</option>
                                    <option>নোটিশ</option>
                                    <option>নিয়োগ বিজ্ঞপ্তি</option>
                                </select>
                                @error('type')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label for="">প্রকাশনা</label>
                                <select name="publish" required id="type" class="custom-select">
                                    <option disabled selected>-- সিলেক্ট করুন --</option>
                                    <option value="1">প্রকাশ করুন</option>
                                    <option value="2">পরবর্তিতে প্রকাশ করুন</option>
                                </select>
                                @error('publish')
                                    <span class=text-danger>{{$message}}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="">ফাইল আপলোড করুন </label>
                            <div class="custom-file">
                                <input name="file" type="file" required class="custom-file-input" id="customFileLang" lang="es">
                                <label class="custom-file-label" for="customFileLang">ফাইল আপলোড </label>
                            </div>
                            @error('file')
                                <span class=text-danger>{{$message}}</span>
                            @enderror
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
                                        <th data-priority="1">নোটিশ</th>
                                        <th>ধরন</th>
                                        <th>প্রকাশনা</th>
                                        <th>প্রকাশের তারিখ</th>
                                        <th>একশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @forelse ($notices as $k => $notice)
                                            <td>{{ $k + 1 }}</td>
                                            <td>
                                                <a target="" href="#">
                                                    {{ $notice->title ?? ''}}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $notice->type ?? ''}}
                                            </td>
                                            <td>
                                                {{ $notice->publish == 1 ? 'Published' : 'Pending' ?? '' }}
                                            </td>
                                            <td>
                                                {{ $notice->created_at ?? ''}}
                                            </td>
                                            <td>
                                                <a data-placement="
                                                    " title="ডিলেট করুন"
                                                    data="tooltip" class="text-danger"
                                                    href="{{route('admin.web.notice.notice.delete', $notice->id ?? '')}}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                    </tr>

                                    @empty
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@stop



