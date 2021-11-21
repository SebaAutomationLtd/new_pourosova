@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> জরুরী যোগাযোগ
                </a>
            </li>
            <li> উপজেলা নির্বাহী কর্মকর্তা</li>

        </ol>
    </section>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>উপজেলা নির্বাহী কর্মকর্তা</h5>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="btn btn-primary">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('admin.web.contact.uno.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <div class="form-group">
                                <label for="">নাম</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="নাম" value="{{ old('name') }}" required>
                                @error('name')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">পদবী</label>
                                <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" placeholder="পদবী" required>
                                @error('designation')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">ইমেইল</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"   placeholder="ইমেইল" required>
                                @error('email')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">মোবাইল নং</label>
                                <input type="number" class="form-control @error('contact') is-invalid @enderror"  name="contact" placeholder="মোবাইল নং" required>
                                @error('contact')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">টেলিফোন</label>
                                <input type="tel" class="form-control @error('telephone') is-invalid @enderror"  name="telephone" placeholder="টেলিফোন" required>
                                @error('telephone')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">300px * 300px এবং JPG ছবি </label>
                                <div class="custom-file">
                                    <input type="file" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" id="customFileLang" lang="es" required>
                                    <label class="custom-file-label" for="customFileLang">ছবি (JPG Format, 300px *
                                        300px)</label>
                                    @error('photo')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5>উপজেলা নির্বাহী কর্মকর্তা</h5>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div>
                            <img src="{{ asset('uploads/uno') }}/{{ $uno->photo ?? ''}}" width="200"
                                alt="Photo">
                        </div>
                        <div class="h5">
                            নাম: {{ $uno->name ?? ''}}
                        </div>
                        <div>
                            পদবী: {{ $uno->designation ?? ''}}
                        </div>
                        <div>
                            মোবাইল: {{ $uno->contact  ?? ''}}
                        </div>
                        <div>
                            টেলিফোন: {{ $uno->telephone ?? ''}}
                        </div>
                        <div>
                            ইমেইল: {{ $uno->email ?? ''}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@stop
@section('js')
<script type="text/javascript">

    document.forms['form'].elements['name'].value          = [{{ old('name') }}];
    document.forms['form'].elements['designation'].value          = [{{ old('designation') }}];
    document.forms['form'].elements['email'].value          = [{{ old('email') }}];
    document.forms['form'].elements['contact'].value          = [{{ old('contact') }}];
    document.forms['form'].elements['telephone'].value          = [{{ old('telephone') }}];
    document.forms['form'].elements['photo'].value          = [{{ old('photo') }}];
</script>
@stop



