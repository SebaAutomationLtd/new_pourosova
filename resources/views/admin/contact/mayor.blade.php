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
            <li> মেয়রের তথ্য</li>

        </ol>
    </section>
@stop


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card main-chart">
                <div class="card-header panel-tabs">
                    <h5 class="h5">মেয়রের তথ্য</h5>
                </div>
                <div class="card-body">
   
                    <form action="{{ route('admin.web.contact.mayor.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">মেয়রের নাম</label>
                                <input type="text" class="form-control @error('mayor_name') is-invalid @enderror" value="{{ old('mayor_name') }}" placeholder="নাম" name="mayor_name" required>
                                @error('mayor_name')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">মোবাইল নং</label>
                                <input type="number" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') }}" placeholder="মোবাইল নং" name="contact" required>
                                @error('contact')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">ইমেইল</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="ইমেইল" name="email" required>
                                @error('email')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">পিতার নাম</label>
                                <input type="text" class="form-control @error('father') is-invalid @enderror" value="{{ old('father') }}" placeholder="পিতার নাম" name="father" required>
                                @error('father')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">মাতার নাম</label>
                                <input type="text" class="form-control @error('mother') is-invalid @enderror" value="{{ old('mother') }}" placeholder="মাতার নাম" name="mother" required>
                                @error('mother')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">জন্ম তারিখ</label>
                                <input type="date" class="form-control @error('date_birth') is-invalid @enderror" value="{{ old('date_birth') }}" placeholder="জন্ম তারিখ" name="date_birth" required>
                                     @error('title')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">বর্তমান ঠিকানা</label>
                                <textarea class="form-control @error('present_address') is-invalid @enderror" value="{{ old('present_address') }}" placeholder="বর্তমান ঠিকানা" name="present_address" required></textarea>
                                @error('present_address')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">স্থায়ী ঠিকানা</label>
                                <textarea name="permanent_address" class="form-control @error('permanent_address') is-invalid @enderror" value="{{ old('permanent_address') }}" placeholder="স্থায়ী ঠিকানা" required></textarea>
                                @error('permanent_address')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">জাতীয়তা</label>
                                <input type="text" class="form-control @error('nationality') is-invalid @enderror" value="{{ old('nationality') }}" placeholder="জাতীয়তা" name="nationality" required>
                                @error('nationality')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">ধর্ম</label>
                                <input type="text" class="form-control @error('religion') is-invalid @enderror" value="{{ old('religion') }}" placeholder="ধর্ম" name="religion" required>
                                @error('religion')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">লিঙ্গ</label>
                                <select name="gender" class="custom-select  @error('gender') is-invalid @enderror" id=""  required>
                                    <option value="" selected disabled>-- সিলেক্ট করুন --</option>
                                    <option value="1">পুরুষ</option>
                                    <option value="2">মহিলা</option>
                                </select>
                                @error('gender')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">বৈবাহিক অবস্থা</label>
                                <select name="marital_status" class="custom-select @error('marital_status') is-invalid @enderror" required>
                                    <option selected disabled>-- সিলেক্ট করুন --</option>
                                    <option value="1">বিবাহিত</option>
                                    <option value="2">অবিবাহিত</option>
                                </select>
                                @error('marital_status')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="">অর্জিত সর্বশেষ ডিগ্রী</label>
                                <input type="text" class="form-control @error('latest_degree') is-invalid @enderror" value="{{ old('latest_degree') }}" placeholder="অর্জিত সর্বশেষ ডিগ্রী" name="latest_degree" required>
                                @error('latest_degree')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-sm-6 col-sm-6">
                                <label for="">রক্তের গ্রুপ</label>
                                <select name="blood_group" class="custom-select  @error('blood_group') is-invalid @enderror" required>
                                    <option value="" selected disabled>-- সিলেক্ট করুন --</option>
                                    <option value="B+">B+</option>
                                    <option value="B">B-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="O+">O+</option>
                                    <option value="B">O-</option>
                                    <option value="AB">AB+</option>
                                    <option value="AB">AB-</option>
                                </select>
                                @error('blood_group')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">সাবমিট</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card main-chart mt-4 mt-md-0">
                <div class="card-header panel-tabs">
                    <h5 class="h5">মেয়রের প্রফেশনাল অভিজ্ঞতা</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web.contact.mayor.professional_mayor') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">পদবী</label>
                                <input type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" placeholder="পদবী" required>
                                @error('designation')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">প্রতিষ্ঠানের নাম</label>
                                <input type="text" class="form-control @error('institute_name') is-invalid @enderror" name="institute_name" value="{{ old('institute_name') }}" placeholder="প্রতিষ্ঠানের নাম" required>
                                @error('institute_name')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">সাবমিট</button>
                    </form>

                    <table class="table mt-4 table-bordered table-hover">
                        <tr>
                            <th>পদবী</th>
                            <th>প্রতিষ্ঠানের নাম</th>
                            <th>একশন</th>
                        </tr>
                        @foreach($professional_mayors as $key=>$mayor)
                        <tr>
                            <td>{{ $mayor->designation}}</td>
                            <td> {{ $mayor->institute_name }}</td>
                            <td>
                                <a data-placement="left" data-toggle="modal" data-target="#delete_mayor{{ $mayor->id}}" title="ডিলেট করুন" data="tooltip" class="text-danger" href="#">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="delete_mayor{{ $mayor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                <h5 class="modal-title text-center" id="exampleModalLongTitle">Are you sure delete It!</h5>
                                <br>
                                <form action="{{ route('admin.web.contact.professional_mayor.delete',$mayor->id)}}" method="post">
                                    @csrf
                                    <p class="text-center">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </p>
                                 </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
<script type="text/javascript">
    document.forms['form'].elements['title'].value          = [{{ old('title') }}];
            document.forms['form'].elements['mayor_name']    =[{{ old('mayor_name') }} ];
            document.forms['form'].elements['contact']       =[{{ old('contact') }} ];
            document.forms['form'].elements['email']         =[{{ old('email') }} ];
            document.forms['form'].elements['father]'        =[{{ old('father') }} ];
            document.forms['form'].elements['mother']        =[{{ old('mother') }} ];
            document.forms['form'].elements['date_birth']    =[{{ old('date_birth') }} ];
            document.forms['form'].elements['permanent_address'] =[{{ old('permanent_address') }} ];
            document.forms['form'].elements['present_address'] =[{{ old('present_address') }} ];
            document.forms['form'].elements['nationality']   =[{{ old('nationality') }} ];
            document.forms['form'].elements['religion']      =[{{ old('religion') }} ];
            document.forms['form'].elements['gender']        =[{{ old('gender') }} ];
            document.forms['form'].elements['marital_status']=[{{ old('marital_status') }} ];
            document.forms['form'].elements['latest_degree'] =[{{ old('latest_degree') }} ];
            document.forms['form'].elements['blood_group']   =[{{ old('blood_group') }} ];
            document.forms['form'].elements['designation']   =[{{ old('designation') }} ];
            document.forms['form'].elements['institute_name']   =[{{ old('institute_name') }} ];
        </script>
@stop



