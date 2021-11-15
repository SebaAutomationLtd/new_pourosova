@extends('frontend.member.member_master')
@section('member_content')


  
                  <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="dashboard-body">
                        <div class="content-header">
                            {{ $title }} এর আবেদন
                        </div>
                        <div class="content py-5">
                            <div class="form-row sonod">

                <form action="{{ route('sonod.store') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $id }}" name="sonod_id">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">নাম</label>
                                <input name="name" required type="text" class="form-control" placeholder="সম্পূর্ণ নাম">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="mb-1">
                                    <select name="gtype">
                                        <option value="1">পিতার নাম</option>
                                        <option value="2">স্বামীর নাম</option>
                                    </select>
                                </label>
                                <input required name="father" type="text" class="form-control" placeholder="পিতার নাম">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">মাতার নাম</label>
                                <input required name="mother" type="text" class="form-control" placeholder="মাতার নাম">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">মোবাইল নং</label>
                                <input required type="text" name="mobile" class="form-control" placeholder="মোবাইল নং">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="mb-1">
                                    <select name="nidtype">
                                        <option value="1">জাতীয় পরিচয়পত্র নং</option>
                                        <option value="2">জন্ম নিবন্ধন সনদ নং</option>
                                    </select>
                                </label>
                                <input required type="text" name="nidno" class="form-control"
                                    placeholder="জাতীয় পরিচয়পত্র নং">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">জন্ম তারিখ</label>
                                <div class="d-flex">
                                    <select name="dob_day" required class="form-control">
                                        <option value="">Day</option>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option>{{ $i }}</option>
                                        @endfor
                                    </select>

                                    <select name="dob_month" required class="form-control">
                                        <option value="">Month</option>
                                        <option>January</option>
                                        <option>February</option>
                                        <option>March</option>
                                        <option>April</option>
                                        <option>May</option>
                                        <option>June</option>
                                        <option>July</option>
                                        <option>August</option>
                                        <option>September</option>
                                        <option>October</option>
                                        <option>November</option>
                                        <option>December</option>
                                    </select>

                                    <select required name="dob_year" class="form-control">
                                        <option value="">Year</option>
                                        @for ($i = 2021; $i >= 1880; $i--)
                                            <option>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if ($id == 1)

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">মৃত্যুর তারিখ</label>
                                    <div class="d-flex">
                                        <select name="dod_day" class="form-control">
                                            <option value="">Day</option>
                                            @for ($i = 1; $i <= 31; $i++)
                                                <option>{{ $i }}</option>
                                            @endfor
                                        </select>

                                        <select name="dod_month" class="form-control">
                                            <option value="">Month</option>
                                            <option>January</option>
                                            <option>February</option>
                                            <option>March</option>
                                            <option>April</option>
                                            <option>May</option>
                                            <option>June</option>
                                            <option>July</option>
                                            <option>August</option>
                                            <option>September</option>
                                            <option>October</option>
                                            <option>November</option>
                                            <option>December</option>
                                        </select>

                                        <select name="dod_year" class="form-control">
                                            <option value="">Year</option>
                                            @for ($i = 2021; $i >= 1880; $i--)
                                                <option>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="">ঠিকানা</label>
                                <textarea required name="permanent_address" class="form-control"
                                    placeholder="ঠিকানা"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">সাবমিট করুন</button>
                    </div>
                </form>

            </div>

                        </div>
                    </div>
                </div>
@endsection


