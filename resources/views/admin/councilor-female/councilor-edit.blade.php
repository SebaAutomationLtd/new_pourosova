@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> কাউন্সিলর
                </a>
            </li>
            <li> সংরক্ষিত কাউন্সিলর আপডেট</li>
        </ol>
    </section>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5 class="h5">আপডেট  সংরক্ষিত কাউন্সিলর</h5>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="btn btn-primary" id="report-alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.web.councilor.female.update',$female_councilor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">নাম</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $female_councilor->name }}" required>
                                @error('name')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">স্থান</label>
                                <input type="text" name="place" value="{{ $female_councilor->place }}" class="form-control @error('contact') is-invalid @enderror" required>
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
                                <select name="ward_no" class="custom-select" required>
                                    <option value="" selected disabled>-- সিলেক্ট করুন --</option>
                                    <option value="1">ওয়ার্ড ০১</option>
                                    <option value="2">ওয়ার্ড ০২</option>
                                    <option value="3">ওয়ার্ড ০৩</option>
                                    <option value="4">ওয়ার্ড ০৪</option>
                                    <option value="5">ওয়ার্ড ০৫</option>
                                    <option value="6">ওয়ার্ড ০৬</option>
                                    <option value="7">ওয়ার্ড ০৭</option>
                                    <option value="8">ওয়ার্ড ০৮</option>
                                    <option value="9">ওয়ার্ড ০৯</option>
                                    <option value="10">ওয়ার্ড ১০</option>
                                </select>
                                @error('ward_no')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">মোবাইল নং</label>
                                <input type="tel" class="form-control @error('contact') is-invalid @enderror" placeholder="মোবাইল নং" name="contact" value="{{ $female_councilor->contact }}" required>
                                @error('contact')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">300px * 300px এবং JPG ছবি</label><br>
                            <img src="{{ asset('uploads/councilor')}}/{{ $female_councilor->photo}}" height="100px" width="200px">
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
                            <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror"  placeholder="দৈর্ঘ পরিমান" required>{{ $female_councilor->description }}</textarea>
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



