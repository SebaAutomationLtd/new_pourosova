@include ('frontend.include.header')
@include ('frontend.include.leftbar')

    <!-- Content Column End -->
<div class="col-md-6 order-md-2 order-1" id="content">
                    <div>
                        <div>
                            <!--Main Slider Start-->
                            <div id="main-slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#main-slider" data-slide-to="0"
                                        aria-current="location"></li>
                                    <li data-target="#main-slider" data-slide-to="1"></li>
                                    <li data-target="#main-slider" data-slide-to="2"></li>
                                    <li data-target="#main-slider" data-slide-to="3"></li>
                                    <li data-target="#main-slider" data-slide-to="4"></li>
                                </ol>
                                <div class="carousel-inner">
                                    @forelse($sliders as $slider)
                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                            <img class="d-block w-100" src="{{ asset('uploads/slider/'.$slider->image ?? '') }}" alt="">
                                        </div>
                                    @empty
                                    @endforelse

                                </div>
                                <a class="carousel-control-prev" href="#main-slider" data-slide="prev" role="button">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#main-slider" data-slide="next" role="button">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!--Main Slider Start-->


                            <!--Sub Notice Start-->
                            <div class="sub-notice my-3">
                                <div>
                                    <a href="">
                                        তারাব পৌরসভার সকল সেবা এখন অনলাইনে। নিবন্ধন করুন DigitalPaurashava.gov.bd তে।
                                    </a>
                                </div>
                            </div>
                            <!--Sub Notice End-->


                           <!--Sub Notice Start-->
                            <div class="welcome my-3">
                                <div class="content-header mb-3">
                                    <h5 class="m-0 font-weight-bold">স্বাগতম</h5>
                                </div>
                                <div class="padding-15">
                                    <h5>{{$about_pauro->title ?? ''}}</h5>
                                   {{$about_pauro->description ?? ''}}
                                </div>
                            </div>
                            <!--Sub Notice End-->


                            <!--Service Start-->
                            <div class="service my-3">

                                <div class="content-header mb-3">
                                    <h5 class="m-0 font-weight-bold">আমাদের সেবাসমূহ</h5>
                                </div>
                                <div class="content">
                                    <div class="padding-15">
                                        <!--Service Item Start-->
                                        <div class="form-row">

                                            @foreach($services as $service)
                                            <!-- Service Item -->
                                            <div class="col-md-4 col-6">
                                                <a href="{{$service->link}}">
                                                    <div class="card mt-2">
                                                        <div class="card-body text-center">

                                                            <!-- <i class="fa fa-house-user"></i> -->
                                                            <img src="{{ asset('uploads/service/'.$service->image ?? '') }}" style="height: 80px; width: 80px;">
                                                            <div class="title">
                                                                {{$service->title ?? ''}}
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
                            <!--Service Item End-->


                            <!-- Awareness Start-->
                            <div class="aware my-3 mt-4">
                                <div class="content-header mb-3">
                                    <h5 class="m-0 font-weight-bold">সচেতনতা</h5>
                                </div>
                                <div>
                                    <img class="d-block w-100" src="images/Awareness.jpg" alt="">
                                </div>
                            </div>
                            <!-- Awareness End-->

                        </div>
                    </div>
                </div>
                <!-- Content Column End -->

@include ('frontend.include.rightbar')
@include ('frontend.include.footer')
