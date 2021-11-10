@extends('admin.layout.master')
@section('content')


    <div class="content-wrapper">

        <section class="content  card card-primary">
            <div class="container-fluid">
                <div class="row mb-2" style="margin-top: 20px">
                    <div class="col-sm-6">
                        <h4> ইউজার আপডেট করুন</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">হোম</a></li>
                            <li class="breadcrumb-item active"> ইউজার আপডেট করুন</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="website-form form-group">
                            <div class="card-header">
                                <h3 class="card-title"> ইউজার আপডেট করুন</h3>
                            </div>
                            <br>
                            <form class="needs-validation" action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="inputName" class="col-form-label">ইউজার আইডি</label>
                                        <input type="text" class="form-control @error('user_id') is-invalid @enderror"
                                               name="user_id" placeholder="ইউজার আইডি" value="{{ $user->id }}">

                                        @error('user_id')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror

                                    </div>




                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="inputName" class="col-form-label">ইউজার রোল</label>
                                        <select id="userRole" class="form-control @error('role') is-invalid @enderror" name="role" >
                                            <option value="{{ $user->role }}">{{ $user->role }}</option>
                                            <option value="Super Admin">সুপারএডমিন+সাপোর্ট এডমিন</option>
                                            <option value="Mayor">মেয়র</option>
                                            <option value="Secretary">সচিব/প্রধান নির্বাহী কর্মকতা</option>
                                            <option value="License">লাইসেন্স শাখা</option>
                                            <option value="Tax">কর শাখা</option>
                                            <option value="Certificate">সনদ শাখা</option>
                                            <option value="Councillor">কাউন্সিলর</option>
                                        </select>
                                        @error('role')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6" id="wardSection">
                                        <label for="inputName" class="col-form-label">কাউন্সিলর ওয়ার্ড</label>
                                        <select class="form-control @error('ward') is-invalid @enderror" name="ward" >
                                            <option value="">ওয়ার্ড নির্বাচন করুন</option>
                                            @php
                                                $wards = DB::table('wards')->orderBy('id','DESC')->get();
                                            @endphp
                                            @foreach($wards as $row)
                                                <option {{ $row->id == $user->ward ? 'selected' : '' }} value="{{$row->id}}">{{$row->ward_no}}</option>
                                            @endforeach
                                        </select>
                                        @error('ward')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="inputName" class="col-form-label">ইউজার নাম </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" placeholder="ইউজার নাম" value="{{ $user->name }}">

                                        @error('name')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="inputName" class="col-form-label">ইউজার ইমেইল </label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               name="email" placeholder="ইউজার ইমেইল" value="{{ $user->email }}">

                                        @error('email')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="inputName" class="col-form-label">পাসওয়ার্ড </label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                               name="password" placeholder="পাসওয়ার্ড" value="{{ old('password') }}">

                                        @error('password')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label for="inputName" class="col-form-label">যোগাযোগ নাম্বার </label>
                                        <input type="text" class="form-control @error('contact') is-invalid @enderror"
                                               name="contact" placeholder="যোগাযোগ নাম্বার" value="{{ $user->contact }}">

                                        @error('contact')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="inputName" class="col-form-label">ছবি </label>
                                        <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                               name="photo">
                                        <img src="{{ asset('Admin/img/user_photo/'.$user->photo) }}" class="img img-responsive img-thumbnail" width="300px" alt="">
                                        @error('photo')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                        @enderror

                                    </div>
                                </div>


                                <div style="padding: 10px 0px 25px">
                                    <button type="submit" class="btn btn-primary save_data">সম্পাদন </button>
                                </div>

                            </form>
                        </div>


                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection
