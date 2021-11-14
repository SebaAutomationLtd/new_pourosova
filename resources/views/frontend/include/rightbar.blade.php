
                <!-- Right Column Start -->
                <div class="col-md-3 order-3">
                    <div id="right-sidebar">
                        <div>

                            <div class="add">
                                <img src="{{ asset('uploads/rightside/'. ($right_top_banner ? $right_top_banner->photo : '')) }}" alt="">
                            </div>


                            <!-- Notice Section Start -->
                            <div class="notice mb-3 mt-1">
                                <div class="content-header">
                                    <h5>
                                        <a href="">
                                            আপডেট নোটিশ
                                        </a>
                                    </h5>
                                </div>

                                <div class="content-body">
                                    <div class="">
                                        <marquee scrollamount='3' behavior="" direction="up">

                                            @foreach($marquees as $marquee)
                                            <a href="{{$marquee->link}}" class="item">
                                                {{$marquee->title}}
                                                <!-- <small>০১-০১-২০২১</small> -->
                                            </a>
                                            @endforeach

                                        </marquee>

                                    </div>
                                </div>

                            </div>
                            <!-- Notice Section Start -->


                            <!-- Links Start -->
                            <div class="links">
                                <div class="content-header">
                                    <h5>
                                        <a>
                                            গুরুত্বপূর্ণ লিঙ্কসমূহ
                                        </a>
                                    </h5>
                                </div>
                                <div class="content-body">
                                    <div class="list-group">
                                        @foreach($right_links as $link)
                                        <a href="{{ $link->link ?? '' }}" class="list-group-item list-group-item-action">
                                            {{ $link->title ?? '' }}
                                        </a>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <!-- Links End -->

                            @forelse($right_banners as $right_banner)
                                <div class="mt-3">
                                    <div class="content-header">
                                        <h5>
                                            <a>
                                                {{ $right_banner->title ?? ''}}
                                            </a>
                                        </h5>
                                    </div>

                                    <div class="app-links ">
                                        <div>
                                            <div>
                                                <img class="d-block w-100" src="{{ asset('uploads/rightside/'.$right_banner->photo ?? '') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        @empty
                        @endforelse

                        </div>
                    </div>
                </div>
                <!-- Right Column End -->

            </div>
        </div>
    </section>
