@extends('admin.layout.master')
@section('header')
    <section class="content-header pl-3">
        <h1>ওয়েবসাইট</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw ti-home"></i> পৌরসভার তথ্য
                </a>
            </li>
            <li> যোগাযোগ</li>

        </ol>
    </section>
@stop


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5 class="h5">যোগাযোগ<a href="{{route('admin.web.info.contact.edit',$contact->id ?? '')}}" id="update" class="float-right btn btn-success">আপডেট করুন</a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div id="updateForm" class="col-md-6">
                            <form action="{{route('admin.web.info.contact.store')}}" method="POST">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="">যোগাযোগ</label>
                                        <input type="text" value="{{ old('address') }}" required name="address" class="form-control">
                                        @error('address')
                                            <span class=text-danger>{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="">টেলিফোন</label>
                                        <input type="text" value="{{ old('telephone') }}" required name="telephone" class="form-control">
                                        @error('telephone')
                                            <span class=text-danger>{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="">ইমেইল</label>
                                        <input type="text" value="{{ old('email') }}" required name="email" class="form-control">
                                        @error('email')
                                            <span class=text-danger>{{$message}}</span>
                                        @enderror
                                    </div>

                                </div>
                                <button class="btn btn-primary">সাবমিট</button>
                            </form>
                        </div>

                        <div class="col-md-6 mt-4 mt-md-0">
                            <label for="" class="font-weight-bold h5">পূর্বের তথ্য</label>
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>ঠিকানা</th>
                                    <td>{{$contact->address ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>টেলিফোন</th>
                                    <td>{{$contact->telephone ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th>ইমেইল</th>
                                    <td>{{$contact->email ?? ''}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>





@stop



