@extends('frontend.member.member_master')
@section('member_content')
  @php
  $data = $user->bosotbariholding ?? $user->businessholding 
  @endphp

  
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
                                    <td>{{Auth::user()->name}}</td>
                                </tr>
                                <tr>
                                    <th>পিতার নাম</th>
                                    <td>{{$data->father}}</td>
                                </tr>
                                <tr>
                                    <th>মাতার নাম</th>
                                    <td>{{$data->mother}}</td>
                                </tr>
                               

                                <tr>
                                    <th>জাতীয় পরিচয় পত্র</th>
                                    <td>{{$data->nid}}</td>
                                </tr>

                                <tr>
                                    <th>হোল্ডিং নং</th>
                                    <td>{{$data->holding_no}}</td>
                                </tr>

                                <tr>
                                    <th>বার্থডে</th>
                                    <td>{{$data->dob}}</td>
                                </tr>

                                <tr>
                                    <th>বার্ষিক কর</th>
                                    <td>{{$data->yearly_vat}}</td>
                                </tr>

                                <tr>
                                    <th>সার্ভিস চার্জ</th>
                                    <td>{{$data->service_charge}}</td>
                                </tr>

                            </table>

                        </div>
                    </div>
                </div>
@endsection


