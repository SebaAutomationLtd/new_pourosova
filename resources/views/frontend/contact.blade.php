@include ('frontend.include.header')
@include ('frontend.include.leftbar')

                <!-- Content Column End -->
                <div class="col-md-6 order-md-2 order-1" id="edicational-info-page">
                    <div>
                        <div>

                            <!--Description Start-->
                            <div class="welcome mb-3">
                                <div class="content-header">
                                    <h5 class="m-0 font-weight-bold">যোগাযোগ করুন</h5>
                                </div>
                                <div class="padding-15 mt-2">

                                    <div class="item m-3">
                                        <h5 class="font-weight-bold">তারাব পৌরসভা</h5>
                                        <table class="table table-hover table-sm">
                                            <tr>
                                                <th>যোগাযোগ</th>
                                                <td>-</td>
                                                <td>{{$contact->address}}</td>
                                            </tr>
                                            <tr>
                                                <th>টেলিফোন:</th>
                                                <td>-</td>
                                                <td>{{$contact->telephone}}</td>
                                            </tr>
                                            <tr>
                                                <th>ইমেইল:</th>
                                                <td>-</td>
                                                <td>{{$contact->email}}</td>
                                            </tr>
                                        </table>

                                        <!--
                                        <div><b>যোগাযোগ - </b>খাদুন, রুপগঞ্জ, নারায়ণগঞ্জ</div>
                                        <div><b>ইমেইল -</b>info@gmail.com</div>
                                        <div><b>টেলিফোন - </b>+৮৮-০৯৬০০১৭৭৩৫০০</div>
                                            -->
                                    </div>


                                    <div class="content-header mt-5">
                                        <h5 class="m-0 font-weight-bold">গুগল ম্যাপে লোকেশন</h5>
                                    </div>

                                    <div class="map">
                                        <div class="mapouter">
                                            <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%"
                                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                                    src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Trisal Pourosova&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                                    href="https://www.fridaynightfunkin.net/">FNF Download</a></div>
                                            <style>
                                                .mapouter {
                                                    position: relative;
                                                    text-align: right;
                                                    width: 100%;
                                                    height: 400px;
                                                }

                                                .gmap_canvas {
                                                    overflow: hidden;
                                                    background: none !important;
                                                    width: 100%;
                                                    height: 400px;
                                                }

                                                .gmap_iframe {
                                                    height: 400px !important;
                                                }
                                            </style>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Description End-->
                        </div>
                    </div>
                </div>
                <!-- Content Column End -->

@include ('frontend.include.rightbar')
@include ('frontend.include.footer')
