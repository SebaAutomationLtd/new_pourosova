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
                    <h5>কাউন্সিলর বৃন্দ</h5>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="btn btn-primary" id="report-alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.web.councilor.female.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">নাম</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="নাম" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">স্থান</label>
                                <input type="text" name="place" value="{{ old('place') }}" class="form-control @error('contact') is-invalid @enderror" placeholder="স্থান">
                                @error('place')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">ওয়ার্ড নং</label>
                                <select name="ward_no" class="custom-select @error('ward_no') is-invalid @enderror">
                                    <option value="">-- সিলেক্ট করুন --</option>
                                    @foreach($wards as $ward)
                                        <option value="{{ $ward->ward_no}}">ওয়ার্ড  {{ $ward->ward_no }}</option>
                                    @endforeach
                                </select>
                                @error('ward_no')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">মোবাইল নং</label>
                                <input type="tel" class="form-control @error('contact') is-invalid @enderror" placeholder="মোবাইল নং" name="contact" value="{{ old('contact') }}">
                                @error('contact')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">300px * 300px এবং JPG ছবি আপলোড করুন</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="customFileLang" lang="es" name="photo">
                                <label class="custom-file-label" for="customFileLang">ছবি (JPG Format, 300px *
                                    300px)</label>
                                @error('photo')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror"  placeholder="দৈর্ঘ পরিমান" >{{ old('description') }}</textarea>
                            @error('description')
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
    </div>
@stop



