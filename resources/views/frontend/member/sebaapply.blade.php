@extends('frontend.member.member_master')
@section('member_content')


  
                  <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="dashboard-body">
                        <div class="content-header">
                          নাগরিক সেবার আবেদন
                        </div>
                        <div class="content py-5">
                           <div class="form-row sonod">

                @foreach ($sonods as $sonod)
                    <!-- Service Item -->
                    <div class="col-md-4 col-6">
                        <a href="{{ route('sonod.create', [$sonod->id, $sonod->title]) }}">
                            <div class="card mt-2">
                                <div class="card-body text-center">

                                    <i class="fa-3x far fa-list-alt"></i>
                                    <div class="title h6">
                                        {{ $sonod->title }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

                        </div>
                    </div>
                </div>
@endsection


