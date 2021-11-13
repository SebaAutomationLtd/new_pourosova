@extends('frontend.member.member_master')
@section('member_content')
	

	                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="dashboard-body">
                        <div class="content-header">
                           পাসওয়ার্ড পরিবর্তন করুন
                        </div>
                        <div class="content py-5">
                           <form action="{{ route('member.update_password')}}" method="post">
                           	@csrf

                                @if (Session::has('success'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            <center>{{Session::get('success')}}</center>
                                        </div>
                                    @endif

                                     @if (Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <center>{{Session::get('error')}}</center>
                                        </div>
                                    @endif

                                   

                               <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="">আগের পাসওয়ার্ড</label>
                                        <input type="password"  name="old_password" value="{{ old('old_password') }}" required class="form-control" placeholder="আগের পাসওয়ার্ড">

                                        @error('old_password')
                                            <span class=text-danger>{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="">নতুন পাসওয়ার্ড</label>
                                        <input type="password" name="new_password" value="{{ old('new_password') }}" required class="form-control" placeholder="নতুন পাসওয়ার্ড">
                                        @error('new_password')
                                            <span class=text-danger>{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="">পাসওয়ার্ড নিশ্চিত করুন</label>
                                        <input type="password" name="confirm_password" value="{{ old('confirm_password') }}" required class="form-control" placeholder="পাসওয়ার্ড নিশ্চিত করুন">
                                        @error('confirm_password')
                                            <span class=text-danger>{{$message}}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <button class="btn btn-info btn-block">সাবমিট</button>
                                    </div>
                                    
                               </div>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection