@extends('frontend.member.member_master')
@section('member_content')



                  <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="dashboard-body">
                        <div class="content-header">
                            প্রোফাইলের তথ্য দেখুন
                        </div>
                        <div class="content py-5">
                            <table class="data">
                                <tr>
                                    <th>ছবি</th>
                                    <td>
                                     <form action="{{ route('member.photo_update') }}" method="post" enctype="multipart/form-data">
                                      @csrf
                                        <img src="{{ asset(Auth::user()->photo ?? 'uploads/users/user.jpg')  }} " alt="" style="width: 100px; height: 100px;">

                                        <input type="file" name="photo" required >
                                        <button class="btn btn-info">পরিবর্তন </button>

                                       </form>
                                    </td>
                                </tr>
                                <tr>
                                    <th>নাম</th>
                                    <td>{{Auth::user()->name??''}}</td>
                                </tr>
                                <tr>
                                    <th>পিতার নাম</th>
                                    <td>{{$data->father??''}}</td>
                                </tr>

                                <tr>
                                    <th>মাতার নাম</th>
                                    <td>{{$data->mother??''}}</td>
                                </tr>

                                <tr>
                                    <th>স্পস</th>
                                    <td>{{$data->spouse??''}}</td>
                                </tr>

                                <tr>
                                    <th>লিঙ্গ</th>
                                    <td>{{$data->gender_data->name ??''}}</td>
                                </tr>

                                <tr>
                                    <th>বৈবাহিক অবস্তা</th>
                                    <td>{{$data->marital_status->name??''}}</td>
                                </tr>

                                 <tr>
                                    <th>বার্থডে</th>
                                    <td>{{$data->dob??''}}</td>
                                </tr>

                                <tr>
                                    <th>জাতীয় পরিচয় পত্র</th>
                                    <td>{{$data->nid??''}}</td>
                                </tr>

                                <tr>
                                    <th>বার্থডে সার্টিফিকেট</th>
                                    <td>{{$data->birth_certificate??''}}</td>
                                </tr>

                                <tr>
                                    <th>ধর্ম</th>
                                    <td>{{$data->religion_data->name??''}}</td>
                                </tr>

                                <tr>
                                    <th>পরিবারের অবস্তা</th>
                                    <td>{{$data->family_class->name ??''}}</td>
                                </tr>

                                <tr>
                                    <th>ওয়ার্ড </th>
                                    <td>{{$data->ward->ward_no ??''}}</td>
                                </tr>

                                <tr>
                                    <th>গ্রাম</th>
                                    <td>{{$data->village->name ??''}}</td>
                                </tr>

                                <tr>
                                    <th>পোস্ট অফিস</th>
                                    <td>{{$data->post_office->name ??''}}</td>
                                </tr>

                                <tr>
                                    <th>বাড়ির ধরন</th>
                                    <td>{{$data->house_type->name??''}}</td>
                                </tr>

                                <tr>
                                    <th>হোল্ডিং নং</th>
                                    <td>{{$data->holding_no??''}}</td>
                                </tr>

                                <tr>
                                    <th>পেমেন্ট মেথড</th>
                                    <td>{{$data->payment_method->name??''}}</td>
                                </tr>

                                <tr>
                                    <th>পেশা</th>
                                    <td>{{$data->occupation->name??''}}</td>
                                </tr>

                                <tr>
                                    <th>বাতরুম</th>
                                    <td>{{$data->sanitation->name??''}}</td>
                                </tr>

                                <tr>
                                    <th>মোট রুম</th>
                                    <td>{{$data->total_room??''}}</td>
                                </tr>

                                <tr>
                                    <th>দৈর্ঘ্য</th>
                                    <td>{{$data->height??''}}</td>
                                </tr>

                                <tr>
                                    <th>প্রস্থ</th>
                                    <td>{{$data->width??''}}</td>
                                </tr>

                                <tr>
                                    <th>মোট ছেলে</th>
                                    <td>{{$data->total_male??''}}</td>
                                </tr>

                                <tr>
                                    <th>মোট মেয়ে</th>
                                    <td>{{$data->total_female??''}}</td>
                                </tr>

                                <tr>
                                    <th>মাসিক আয়</th>
                                    <td>{{$data->monthly_income??''}}</td>
                                </tr>

                                <tr>
                                    <th>বার্ষিক কর</th>
                                    <td>{{$data->yearly_vat??''}}</td>
                                </tr>

                                <tr>
                                    <th>সার্ভিস চার্জ</th>
                                    <td>{{$data->service_charge??''}}</td>
                                </tr>

                                <tr>
                                    <th>শেষ কর প্রধান</th>
                                    <td>{{$data->last_tax_year??''}}</td>
                                </tr>

                            </table>

                        </div>
                    </div>
                </div>
@endsection


