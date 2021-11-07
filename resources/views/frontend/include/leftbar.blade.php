<section id="main" class="mt-2 mt-md-3">
        <div class="container">
            <div class="form-row">
                <!-- Left Column Start -->
                <div class="col-md-3 order-md-1 order-2" id="left">

                    <div>
                        <div>


                            <div class="mayor-section">
                                <div class="content-header">
                                    <h5>
                                        <a href="{{ route('mayor.contact') }}">
                                            সম্মানিত মেয়র
                                        </a>
                                    </h5>
                                </div>
                                <a href="#">
                                    <div class="mayor">
                                        <div class="text-center">
                                            <img class="rounded img-fluid w-100 d-block" src="{{ asset('img/'. ($mayor ? $mayor->image : '')) }}"
                                                alt="">
                                            <h5 class="mt-2 mb-0">{{$mayor->name ?? ''}}</h5>
                                            <div>
                                                {{$website_data->title_bangla ?? ''}}
                                            </div>
                                            <div>
                                                {{$mayor->place ?? ''}}
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>


                            <div class="councilor-section mt-3">
                                <div class="content-header">
                                    <h5>
                                        <a href="{{ route ('counselor') }}">
                                            সম্মানিত কাউন্সিলরগণ
                                        </a>
                                    </h5>
                                </div>

                                <div class="councilor">
                                    <div class="text-center">
                                        <div class="form-row">

                                            @forelse($councilors as $councilor)

                                            <!-- Councilor By Ward -->
                                            <div class="col-6">
                                                <a href="#">
                                                    <div class="info">
                                                        <img class="img-fluid w-100 d-block"
                                                            src="{{ asset('councilor/img/'.$councilor->photo) }}" alt="">
                                                        <h5 class="m-0 title">ওয়ার্ড {{ $councilor->ward_no ?? '' }}</h5>
                                                    </div>
                                                </a>
                                            </div>
                                                @empty
                                                @endforelse

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Councilor Section End  -->



                            <!-- Female Councilor Section Start  -->
                            <div class="councilor-section mt-3">
                                <div class="content-header">
                                    <h5>
                                        <a href="">
                                            সংরক্ষিত আসনের কাউন্সিলরগণ
                                        </a>
                                    </h5>
                                </div>


                                <!--  Councilor By Ward -->
                                <div class="councilor">
                                    <div class="text-center">
                                        <div class="form-row">

                                        @forelse($female_councilors as $councilor)

                                            <!-- Councilor By Ward -->
                                            <div class="col-6">
                                                <a href="#">
                                                    <div class="info">
                                                        <img class="img-fluid w-100 d-block"
                                                            src="{{ asset('councilor/img/'.$councilor->photo) }}" alt="">
                                                        <h5 class="m-0 title">ওয়ার্ড {{ $councilor->ward_no ?? '' }}</h5>
                                                    </div>
                                                </a>
                                            </div>
                                            @empty
                                            @endforelse



                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Female Councilor Section End -->

                            <!-- Important Links Start -->
                            <div class="application-link-section mt-3">
                                <div class="content-header">
                                    <h5>
                                        <a>
                                            গুরুত্বপূর্ণ আবেদনপত্র
                                        </a>
                                    </h5>
                                </div>

                                <div class="app-links ">
                                    <div>
                                        <div class="list-group">
                                            @forelse($left_apps as $data)
                                            <a href="{{ $data->link ?? ''}}" class="list-group-item list-group-item-action">
                                                {{ $data->title ?? ''}}
                                            </a>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Important Links Start -->


                            <!-- Hotline Start -->
                            <div class="application-link-section mt-3">

                                @forelse($left_banners as $left_banner)
                                <div class="content-header">
                                    <h5>
                                        <a>
                                            {{ $left_banner->title ?? ''}}
                                        </a>
                                    </h5>
                                </div>

                                <div class="app-links ">
                                    <div>
                                        <div>
                                            <img class="d-block w-100" src="{{ asset('leftside/img/'.$left_banner->photo) }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                            <!-- Hotline End -->
                        </div>
                    </div>

                </div>
                <!-- Left Column End -->


