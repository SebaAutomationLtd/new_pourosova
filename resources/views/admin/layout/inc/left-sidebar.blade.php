<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar-->
    <section class="sidebar">
        <div id="menu" role="navigation">
            <div class="nav_profile">
                <div class="media profile-left">
                    <a class="float-left profile-thumb" href="#">
                        @if(isset(auth()->user()->photo))
                        <img src="{{ asset('img/users/'. auth()->user()->photo ?? '') }}" class="rounded-circle"
                             alt="User Image">
                             @endif

                         </a>
                    <div class="content-profile">
                        <h4 class="media-heading">{{ auth()->user()->name ?? '' }}</h4>
                        <ul class="icon-list">
                            <li>
                                <a href="#" title="user">
                                    <i class="fa fa-fw ti-user"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="lock">
                                    <i class="fa fa-fw ti-lock"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="settings">
                                    <i class="fa fa-fw ti-settings"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="Login">
                                    <i class="fa fa-fw ti-shift-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="navigation">
                <li class="menu-dropdown">
                    <a href="javascript:void(0)">
                        <i class="menu-icon ti-check-box"></i>
                        <span>ওয়েবসাইট</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-fw ti-receipt"></i> হেডার সেকশন
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.header.logo') }}"> <i class="fa fa-fw ti-cup"></i> লোগো
                                        সেকশন
                                    </a></li>
                                <li><a href="{{ route('admin.header.marquee') }}"> <i class="fa fa-fw ti-cup"></i>
                                        নিউজ স্ক্রোল
                                    </a></li>
                            </ul>
                        </li>
                        <li>

                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-fw ti-receipt"></i> হোমপেইজ
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.index.slider') }}"> <i class="fa fa-fw ti-cup"></i>
                                        মেইন স্লাইডার
                                    </a></li>
                                <li><a href="{{ route('admin.web.right.about_paurosova') }}"> <i
                                            class="fa fa-fw ti-cup"></i>
                                        পৌরসভার সম্পর্কে
                                    </a></li>
                                <li><a href="{{ route('admin.web.right.service') }}"> <i class="fa fa-fw ti-cup"></i>
                                        সার্ভিসসমূহ
                                    </a></li>
                                <li><a href="{{ route('admin.web.mayor') }}"> <i class="fa fa-fw ti-cup"></i>
                                        অন্যান্য তথ্য
                                    </a></li>
                            </ul>
                        </li>

                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-fw ti-receipt"></i> সকল মেয়র
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.web.mayor.create') }}"> <i class="fa fa-fw ti-cup"></i>
                                        নতুন
                                    </a></li>
                                <li><a href="{{ route('admin.web.mayor') }}"> <i class="fa fa-fw ti-cup"></i>
                                        দেখুন
                                    </a></li>
                            </ul>
                        </li>

                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-fw ti-receipt"></i> কাউন্সিলর
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.web.councilor.create') }}"> <i
                                            class="fa fa-fw ti-cup"></i>
                                        নতুন
                                    </a></li>
                                <li><a href="{{ route('admin.web.councilor') }}"> <i class="fa fa-fw ti-cup"></i>
                                        দেখুন
                                    </a></li>

                                <li><a href="{{ route('admin.web.councilor.female.create') }}"> <i
                                            class="fa fa-fw ti-cup"></i>
                                        নতুন (সংরক্ষিত)
                                    </a></li>
                                <li><a href="{{ route('admin.web.councilor.female') }}"> <i
                                            class="fa fa-fw ti-cup"></i>
                                        দেখুন (সংরক্ষিত)
                                    </a></li>
                            </ul>
                        </li>


                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-fw ti-receipt"></i> বাম সাইডবার
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.web.left.app') }}"> <i class="fa fa-fw ti-cup"></i>
                                        গুরুত্বপূর্ণ আবেদনপত্র
                                    </a></li>

                                <li><a href="{{ route('admin.web.left.banner') }}"> <i class="fa fa-fw ti-cup"></i>
                                        ব্যানার সমূহ
                                    </a></li>

                            </ul>
                        </li>

                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-fw ti-receipt"></i> ডান সাইডবার
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.web.right.top') }}"> <i class="fa fa-fw ti-cup"></i>
                                        উপরের ব্যানার
                                    </a></li>
                                <li><a href="{{ route('admin.web.right.links') }}"> <i class="fa fa-fw ti-cup"></i>
                                        গুরুত্বপূর্ণ আবেদনপত্র
                                    </a></li>

                                <li><a href="{{ route('admin.web.right.banner') }}"> <i class="fa fa-fw ti-cup"></i>
                                        ব্যানার সমূহ
                                    </a></li>

                            </ul>
                        </li>


                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-fw ti-receipt"></i> পৌরসভার তথ্য
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.web.info.info') }}"> <i class="fa fa-fw ti-cup"></i>
                                        সংক্ষিপ্ত বিবরণ
                                    </a></li>
                                <li><a href="{{ route('admin.web.info.organogram') }}"> <i
                                            class="fa fa-fw ti-cup"></i>
                                        সাংগঠনিক কাঠামো
                                    </a></li>

                                <li><a href="{{ route('admin.web.info.map') }}"> <i class="fa fa-fw ti-cup"></i>
                                        পৌরসভার মানচিত্র
                                    </a></li>


                                <li><a href="{{ route('admin.web.info.employee') }}"> <i
                                            class="fa fa-fw ti-cup"></i>
                                        কর্মকর্তা ও
                                        কর্মচারী
                                    </a></li>

                                <li><a href="{{ route('admin.web.info.education') }}"> <i
                                            class="fa fa-fw ti-cup"></i>
                                        শিক্ষা বিষয়ক তথ্য
                                    </a></li>
                                <li><a href="{{ route('admin.web.info.contact') }}"> <i class="fa fa-fw ti-cup"></i>
                                        যোগাযোগ
                                    </a></li>

                            </ul>
                        </li>

                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-fw ti-receipt"></i> জরুরী যোগাযোগ
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.web.contact.mayor') }}"> <i
                                            class="fa fa-fw ti-cup"></i>
                                        মেয়রের প্রোফাইল
                                    </a></li>
                                <li><a href="{{ route('admin.web.contact.uno') }}"> <i class="fa fa-fw ti-cup"></i>
                                        উপজেলা নির্বাহি কর্মকর্তা
                                    </a></li>

                                <li><a href="{{ route('admin.web.contact.info') }}"> <i class="fa fa-fw ti-cup"></i>
                                        তথ্য পরিষেবা
                                        কেন্দ্র
                                    </a></li>
                                <li><a href="{{ route('admin.web.contact.admin') }}"> <i
                                            class="fa fa-fw ti-cup"></i>
                                        প্রশাসন বিভাগ
                                    </a></li>

                                <li><a href="{{ route('admin.web.contact.engineer') }}"> <i
                                            class="fa fa-fw ti-cup"></i>
                                        প্রকৌশল বিভাগ
                                    </a></li>

                                <li><a href="{{ route('admin.web.contact.mayor') }}"> <i
                                            class="fa fa-fw ti-cup"></i>
                                        স্বাস্থ্য বিভাগ
                                    </a></li>
                            </ul>
                        </li>
                        </li>

                        <li class="menu-dropdown"><a href="{{ route('admin.web.notice.notice') }}"> <i
                                    class="fa fa-fw ti-cup"></i>
                                নোটিশ
                            </a>
                        </li>

                        <li class="menu-dropdown"><a href="{{ route('admin.web.notice.download') }}"> <i
                                    class="fa fa-fw ti-cup"></i>
                                ডাউনলোড
                            </a></li>


                    </ul>
                </li>
                <li class="menu-dropdown">
                    <a href="javascript:void(0)">
                        <i class="fa fa-fw ti-receipt"></i> সাধারন তথ্য

                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu p-l-40">
                        <li><a href="{{ route('admin.web.religion.religion') }}"> <i
                                    class="fa fa-fw ti-cup"></i>
                                ধর্ম
                            </a>
                        </li>

                        <li><a href="{{ route('admin.web.religion.gender') }}"> <i
                                    class="fa fa-fw ti-cup"></i>
                                জেন্ডার
                            </a>
                        </li>


                        <li><a href="{{ route('admin.web.village.village') }}"> <i
                                    class="fa fa-fw ti-cup"></i>
                                গ্রাম
                            </a>
                        </li>

                        <li><a href="{{ route('admin.web.village.post_office') }}"> <i
                                    class="fa fa-fw ti-cup"></i>
                                পোস্ট অফিস
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="menu-dropdown">
                    <a href="#">
                        <i class="fa fa-fw ti-receipt"></i> রোল পারমিশন ম্যানেজমেন্ট
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu ">
                        <li class="menu-dropdown">
                            <a href="{{ route('roles.create') }}"> <i class="fa fa-plus"></i> এড </a>

                        </li>

                        <li class="menu-dropdown">
                            <a href="{{ route('roles.index') }}"> <i class="fa fa-list"></i> রোল তালিকা </a>

                        </li>

                    </ul>
                </li>
                <li class="menu-dropdown">
                    <a href="#">
                        <i class="fa fa-fw ti-receipt"></i> ইউজার নিবন্ধন
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu ">
                        <li class="menu-dropdown">
                            <a href="{{route('user.create')}}"> <i class="fa fa-fw ti-receipt"></i> এড <span
                                    class="fa fa-plus"></span></a>

                        </li>

                        <li class="menu-dropdown">
                            <a href="{{route('user.index')}}"> <i class="fa fa-fw ti-receipt"></i> ইউজার তালিকা <span
                                    class="fa fa-list"></span></a>

                        </li>


                    </ul>
                </li>

                <li class="menu-dropdown">
                    <a href="javascript:void(0)">
                        <i class="fa fa-fw ti-receipt"></i>এসেসমেন্ট নিবন্ধন

                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('action.search') }}"> <i class="fa fa-fw ti-receipt"></i>
                                একটিভ / ডিএকটিভ

                            </a>
                        </li>
                         <li class="menu-dropdown">
                    <a href="#">
                        <i class="fa fa-fw ti-receipt"></i> বসত বাড়ী হোল্ডিং
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                           <li>
                                <a href="{{url('new-bosot-index')}}" id="all_bosot_bari"> <i class="fa fa-fw ti-receipt"></i> মোট ইউজার
                                </a>
                            </li>


                            <li>
                                <a href="{{url('new-bosot-index-active')}}" id="all_bosot_bari_active">
                                    <i class="fa fa-fw ti-receipt"></i> একটিভ ইউজার
                                </a>
                            </li>
                            <li>
                                <a href="{{url('new-bosot-index-inactive')}}" id="all_bosot_bari_inactive">
                                    <i class="fa fa-fw ti-receipt"></i> পেন্ডিং ইউজার
                                </a>
                            </li>


                            <li>
                                <a href="{{url('new-bosot-index-family')}}">
                                    <i class="fa fa-fw ti-receipt"></i> পরিবারের শ্রেণীবিন্যাস
                                </a>
                            </li>

                    </ul>
                </li>
                <li class="menu-dropdown">
                    <a href="#">
                        <i class="fa fa-fw ti-receipt"></i>  বানিজ্যিক হোল্ডিং
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                           <li>
                                <a href="{{url('new-business-holding-index')}}" id="all_bosot_bari"> <i class="fa fa-fw ti-receipt"></i> মোট ইউজার
                                </a>
                            </li>


                            <li>
                                <a href="{{url('new-business-holding-index-active')}}" id="all_bosot_bari_active">
                                    <i class="fa fa-fw ti-receipt"></i> একটিভ ইউজার
                                </a>
                            </li>
                            <li>
                                <a href="{{url('new-business-holding-index-inactive')}}" id="all_bosot_bari_inactive">
                                    <i class="fa fa-fw ti-receipt"></i> পেন্ডিং ইউজার
                                </a>
                            </li>

                    </ul>
                </li>

                <li class="menu-dropdown">
                    <a href="#">
                        <i class="fa fa-fw ti-receipt"></i> ব্যাবসা প্রতিষ্ঠান
                        <span class="fa arrow"></span>
                    </a>
                     <ul class="sub-menu">
                           <li>
                                <a href="{{url('new-business-index')}}" id="all_bosot_bari"> <i class="fa fa-fw ti-receipt"></i> মোট ইউজার
                                </a>
                            </li>


                            <li>
                                <a href="{{url('new-business-index-active')}}" id="all_bosot_bari_active">
                                    <i class="fa fa-fw ti-receipt"></i> একটিভ ইউজার
                                </a>
                            </li>
                            <li>
                                <a href="{{url('new-business-index-inactive')}}" id="all_bosot_bari_inactive">
                                    <i class="fa fa-fw ti-receipt"></i> পেন্ডিং ইউজার
                                </a>
                            </li>

                    </ul>
                </li>
                    </ul>
                </li>

            </ul>
            <!-- / .navigation -->
        </div>
        <!-- menu -->
    </section>
    <!-- /.sidebar -->
</aside>
