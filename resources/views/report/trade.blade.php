<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>sonod</title>
  <style type="text/css">
 html {
            height: 100%;
        }

        body {
            font-family: 'solaimanlipi', sans-serif;
            position: relative;
            height: 100%;
            z-index: 999;

        }

        /* Create two equal columns that floats next to each other */
        .column25 {
            float: left;
            width: 25%;
        }

        .column50 {
            float: left;
            width: 49%;
        }
        .column75 {
            float: left;
            width: 74%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .container {
            background-color: #fff;
            margin: 0 auto;
            width: 8.27in;
            height: 11.69in;
            padding: .26in;
        }

        .border-1 {
            border: 0.02in solid #b26d82;
            padding: 0.053in;
        }

        .border-2 {
            border: 0.07in solid #b26d82;
            position: relative;
            padding: 15px 15px 15px 15px;
            height: 10.70in;
        }

.main-title{
font-size: 36px;
font-weight: 900;
} 
.sub-title {
font-size: 26px;
font-weight: 900;
}

.sonod-title {
  width: 160px;
  text-align: center;  
  font-size: 16px;
  background-color: #000;
  color: #fff;
  display: block;
  margin: 0 auto;
  padding: 5px 7px;
  font-weight: bold;
  border-radius: 5px;
}
.info_table tr th{
padding: 10px 0px;
font-weight: normal;
}

.info_table tr td {
  padding: 10px 5px;
  font-weight: normal;
}
.sub tr td {
   padding: 2px 5px;
  font-weight: normal;   
}


  </style>
</head>
<body>
   <div class="watermark" style="position: absolute;width: 100%;top: 270px;left: 150px;display: block;height: 100%;z-index: 1;">
                                <img style="width: 65%;opacity: 0.15;display: block;margin: 0 auto;" src="{{asset('logo/govt.png')}}" alt="">
                            </div>
<section>
  <div class="container">
    <div class="certificate">
      
      <div class="border-1">
        <div class="border-2">
          
          <div class="row" style="margin-bottom: 15px;">
            <div class="column25">
                 <img src="{{asset('logo/govt.png')}}" width="90" alt="">
            </div>
            <div class="column50" style="text-align: center;">
                     

                                            <h2 class="main-title" style="margin-bottom: 0px !important;margin-top: 0px; !important">{{ @$website_data->title_bangla }} পৌরসভা</h2>
                                            <h2 class="sub-title" style="margin-bottom: 0px !important;margin-top: 0px; !important">{{ @$website_data->title_bangla }}, ময়মনসিংহ</h2>
                                            <h3 class="sonod-title" style="margin-bottom: 0px !important;color: #fff;">{{$headings->title??''}}</h3>
            </div>
            <div class="column25">
              <img src="{{asset('logo/mujib.png')}}" width="150" alt="" style="float: right;display: block;text-align: right;margin-top: 0.153in;">
            </div>
          </div>

          <div class="row" style="margin-bottom: 5px;">
            
            <div class="column75">
               <table>
                                            <tr width="">
                                                <td class="test">লাইসেন্স নং</td>
                                                <td>:</td>
                                                <td>.........................................................</td>
                                            </tr>
                                            <tr>
                                                <td class="test">লাইসেন্স আইডি</td>
                                                <td>:</td>
                                                <td>.........................................................</td>
                                            </tr>
                                            <tr>
                                                <td class="test">ওয়ার্ড নং</td>
                                                <td>:</td>
                                                <td>
                                                    {{$tradeinfo->ward_id ?? ''}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="test">সার্কেল/রাস্তা/মহল্লা</td>
                                                <td>:</td>
                                                <td> {{$tradeinfo->road_moholla ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <td class="test">লাইসেন্স ইস্যুর তারিখ</td>
                                                <td>:</td>
                                                <td>{{date("d/m/Y", strtotime($data->approved_date))}}</td>
                                            </tr>
                                            <tr>
                                                <td class="test">নবায়নের অর্থ বছর</td>
                                                <td>:</td>
                                                <td>{{$businessyear??''}}</td>
                                            </tr>
                                            <tr>
                                                <td class="test">নবায়নের তারিখ</td>
                                                <td>:</td>
                                                <td>{{date("d/m/Y", strtotime($data->approved_date))}}</td>
                                            </tr>
                                        </table>
                
            </div>
            <div class="column25" style="text-align: right;">
                  <img src="@if($tradeinfo->photo) {{asset('uploads/trade_licence/'.$tradeinfo->photo)}} @else https://via.placeholder.com/150 @endif" width="150" height="150" alt="" style="margin-top: 0.153in;border: 1px solid #c7c7c7;">
                
            </div>

            <div style="width: 100%;font-size: 14px;margin: 5px 0px;">
                  {{$headings->desc ?? ''}}
            </div>
            
          </div>
          <div class="row" style="width: 100%;">
             <table class="main">
                                <tr width="">
                                    <td class="test">ব্যাবসা প্রতিষ্ঠানের নাম</td>
                                    <td>:</td>
                                    <td>{{$tradeinfo->business_name ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td class="test">ব্যাবসার ধরণ</td>
                                    <td>:</td>
                                    <td>{{$business_type->name ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td class="test">মালিকের নাম</td>
                                    <td>:</td>
                                    <td>{{$data->name ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td class="test">পিতা/স্বামীর নাম</td>
                                    <td>:</td>
                                    <td>{{$data->father ?? $data->husband}}</td>
                                </tr>
                                <tr>
                                    <td class="test">মাতার নাম</td>
                                    <td>:</td>
                                    <td>{{$data->mother ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td class="test">ব্যবসা প্রতিষ্ঠানের ঠিকানা</td>
                                    <td>:</td>
                                    <td>{{$data->address ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td class="test">মালিকের ঠিকানা (বর্তমান)</td>
                                    <td>:</td>
                                    <td>{{$tradeinfo->current_address ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td class="test">মালিকের ঠিকানা (স্থায়ী)</td>
                                    <td>:</td>
                                    <td>{{$tradeinfo->permanent_address ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td class="test">জাতীয় পরিচয়পত্র নং</td>
                                    <td>:</td>
                                    <td>{{$data->nid??$data->birth_certificate}}</td>
                                </tr>
                                <tr>
                                    <td class="test">ফোন / মোবাইল নং</td>
                                    <td>:</td>
                                    <td>{{$tradeinfo->mobile??''}}</td>
                                </tr>
                                <tr>
                                    <td class="" valign="top">আর্থিক বিবরণ</td>
                                    <td valign="top">:</td>
                                    <td>
                                        <table class="sub" style="border-collapse: collapse;width: 250px;font-size: 14px;" border="1">
                                            <tr>
                                                <th>আদায়ের বিবরণ</th>
                                                <th width="100">টাকা</th>
                                            </tr>
                                            <tr>
                                                <td>ট্রেড লাইসেন্স / নবায়ন ফি</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>সাইনবোর্ড কর</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>ব্যাবসার কর</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>বকেয়া</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>সারচার্জ</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>মোট</th>
                                                <th>টাকা</th>
                                            </tr>
                                        </table>

                                        <div class="small-text my-3">
                                            লাইসেন্স ধারীর নিকট হইতে সকল পাওনা বাবদ মোট ৫৮২২.০০ টাকা আদায় হইল।
                                        </div>
                                    </td>
                                </tr>                                
                            </table>
              
          </div>

             <!-- Footer Section Start -->
             <div class="row" style="margin-bottom: 20px;">
                <div class="column25" style="text-align: center;">
                     <img src="{{asset('logo/qr.png')}}" width="80" alt=""><br>
                     লাইসেন্স যাচাই করতে <br> জন্য QR কোড টি স্ক্যান করুন
                </div>
                <div class="column75">
                    <table style="width: 450px;padding-top: 90px;" align="right">
                                <tr>
                                    <td style="width: 225px;text-align: center;vertical-align: bottom;">
                                        <span>_______________________</span> <br>
                                        লাইসেন্স পরিদর্শক
                                    </td>
                                    <td style="width: 225px;text-align: center;vertical-align: bottom;">
                                      <span>_______________________</span> <br>
                                        মেয়র
                                    </td>
                                </tr>
                            </table>
                </div>
                 
             </div>
                            

                                <div class="row" style="font-size: 16px;text-align: center;width: 100%;margin-top: 40px;">
                                  কারিগরি সহযোগিতায়: Tech Path Limited
                                </div>
                                

          
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
