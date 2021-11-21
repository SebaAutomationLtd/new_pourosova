@extends('admin.layout.master')

@section('header')
    <section class="content-header pl-3">
        <h1>খসড়া রিপোর্ট</h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-fw ti-home"></i> ড্যাশবোর্ড
            </li>
            <li>খসড়া রিপোর্ট ডাউনলোড</li>
        </ol>
    </section>
@stop

@section('content')

    <div class="content-wrapper">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="">খসড়া রিপোর্ট ডাউনলোড</h3>
            </div>
            <div class="card-body">
                <form class="needs-validation" action="{{ route('khosora-report') }}" method="post">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="">ওয়ার্ড নং</label>
                        <select name="ward_id" id="" class="custom-select">
                            <option disabled selected>-- সিলেক্ট করুন --</option>
                            @forelse($wards as $ward)
                                <option value="{{$ward->id}}">{{$ward->ward_no}}</option>
                            @empty
                            @endforelse

                        </select>
                        @error('ward_id')
                        <span class=text-danger>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">গ্রাম</label>
                        <select name="village_id" id="" class="custom-select">
                            <option disabled selected>-- সিলেক্ট করুন --</option>
                            @forelse($villages as $village)
                                <option value="{{$village->id}}">{{$village->name}}</option>
                            @empty
                            @endforelse

                        </select>
                        @error('village_id')
                        <span class=text-danger>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">রিপোর্টের ধরন</label>
                        <select name="report_type" required id="" class="custom-select">
                            <option value="" disabled selected>-- সিলেক্ট করুন --</option>
                            <option value="bosot_bari">বসত বাড়ি হোল্ডিং</option>
                            <option value="business_hold">বানিজ্যিক হোল্ডিং</option>
                        </select>
                        @error('report_type')
                        <span class=text-danger>{{$message}}</span>
                        @enderror
                    </div>
                    <div style="padding: 10px 0px 25px">
                        <button type="submit" class="btn btn-primary save_data">ডাউনলোড</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
