<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar-->
    <section class="sidebar">
        <div id="menu" role="navigation">
            <div class="nav_profile">
                <div class="media profile-left">
                    <a class="float-left profile-thumb" href="#">
                        @if(isset(auth()->user()->photo))
                            <img src="{{ asset(Auth::user()->photo ?? 'uploads/users/user.jpg') }}"
                                 class="rounded-circle"
                                 alt="User Image">
                        @endif

                    </a>
                    <div class="content-profile">
                        <h4 class="media-heading">{{ auth()->user()->name ?? '' }}</h4>

                    </div>
                </div>
            </div>
            <ul class="navigation">
                @can('website-settings')
                 <li>
                        <a href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i>
                            ড্যাশবোর্ড

                        </a>
                </li>
                <li class="menu-dropdown">
                    <a href="javascript:void(0)">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        <span>ওয়েবসাইট</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                               <i class="fa fa-header" aria-hidden="true"></i> হেডার সেকশন
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.header.logo') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> লোগো
                                        সেকশন
                                    </a></li>
                                <li><a href="{{ route('admin.header.marquee') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        নিউজ স্ক্রোল
                                    </a></li>
                            </ul>
                        </li>
                        <li>

                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                               <i class="fa fa-home" aria-hidden="true"></i> হোমপেইজ
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.index.slider') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        মেইন স্লাইডার
                                    </a></li>
                                <li><a href="{{ route('admin.web.right.about_paurosova') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        পৌরসভার সম্পর্কে
                                    </a></li>
                                <li><a href="{{ route('admin.web.right.service') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        সার্ভিসসমূহ
                                    </a></li>
                            </ul>
                        </li>

                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-list" aria-hidden="true"></i> সকল মেয়র
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.web.mayor.create') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        নতুন
                                    </a></li>
                                <li><a href="{{ route('admin.web.mayor') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        দেখুন
                                    </a></li>
                            </ul>
                        </li>

                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-user" aria-hidden="true"></i> কাউন্সিলর
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.web.councilor.create') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        নতুন
                                    </a></li>
                                <li><a href="{{ route('admin.web.councilor') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        দেখুন
                                    </a></li>

                                <li><a href="{{ route('admin.web.councilor.female.create') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        নতুন (সংরক্ষিত)
                                    </a></li>
                                <li><a href="{{ route('admin.web.councilor.female') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        দেখুন (সংরক্ষিত)
                                    </a></li>
                            </ul>
                        </li>


                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                               <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> বাম সাইডবার
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.web.left.app') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        গুরুত্বপূর্ণ আবেদনপত্র
                                    </a></li>

                                <li><a href="{{ route('admin.web.left.banner') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        ব্যানার সমূহ
                                    </a></li>

                            </ul>
                        </li>

                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                               <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> ডান সাইডবার
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.web.right.top') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        উপরের ব্যানার
                                    </a></li>
                                <li><a href="{{ route('admin.web.right.links') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        গুরুত্বপূর্ণ আবেদনপত্র
                                    </a></li>

                                <li><a href="{{ route('admin.web.right.banner') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        ব্যানার সমূহ
                                    </a></li>

                            </ul>
                        </li>


                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-info-circle" aria-hidden="true"></i> পৌরসভার তথ্য
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.web.info.info') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        সংক্ষিপ্ত বিবরণ
                                    </a></li>
                                <li><a href="{{ route('admin.web.info.organogram') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        সাংগঠনিক কাঠামো
                                    </a></li>

                                <li><a href="{{ route('admin.web.info.map') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        পৌরসভার মানচিত্র
                                    </a></li>


                                <li><a href="{{ route('admin.web.info.employee') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        কর্মকর্তা ও
                                        কর্মচারী
                                    </a></li>

                                <li><a href="{{ route('admin.web.info.education') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        শিক্ষা বিষয়ক তথ্য
                                    </a></li>
                                <li><a href="{{ route('admin.web.info.contact') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        যোগাযোগ
                                    </a></li>

                            </ul>
                        </li>

                        <li class="menu-dropdown">
                            <a href="javascript:void(0)">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> জরুরী যোগাযোগ
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li><a href="{{ route('admin.web.contact.mayor') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        মেয়রের প্রোফাইল
                                    </a></li>
                                <li><a href="{{ route('admin.web.contact.uno') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        উপজেলা নির্বাহি কর্মকর্তা
                                    </a></li>

                                <li><a href="{{ route('admin.web.contact.info') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        তথ্য পরিষেবা
                                        কেন্দ্র
                                    </a></li>
                                <li><a href="{{ route('admin.web.contact.admin') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        প্রশাসন বিভাগ
                                    </a></li>

                                <li><a href="{{ route('admin.web.contact.engineer') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        প্রকৌশল বিভাগ
                                    </a></li>

                                <li><a href="{{ route('admin.web.contact.mayor') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                        স্বাস্থ্য বিভাগ
                                    </a></li>
                            </ul>
                        </li>
                        </li>

                        <li class="menu-dropdown"><a href="{{ route('admin.web.notice.notice') }}"> <i class="fa fa-clipboard" aria-hidden="true"></i>
                                নোটিশ
                            </a>
                        </li>

                        <li class="menu-dropdown"><a href="{{ route('admin.web.notice.download') }}"> <i class="fa fa-download" aria-hidden="true"></i>
                                ডাউনলোড
                            </a></li>


                    </ul>
                </li>
                @endcan
                @can('other-setup')
                <li class="menu-dropdown">
                    <a href="javascript:void(0)">
                        <i class="fa fa-book" aria-hidden="true"></i> সাধারন তথ্য

                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu p-l-40">
                        <li><a href="{{ route('admin.web.religion.religion') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                ধর্ম
                            </a>
                        </li>

                        <li><a href="{{ route('admin.web.religion.gender') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                জেন্ডার
                            </a>
                        </li>

                        <li><a href="{{ route('admin.web.religion.merital_status') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                বৈবাহিক অবস্থা
                            </a>
                        </li>

                        <li><a href="{{ route('admin.web.village.ward') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                ওয়ার্ড
                            </a>
                        </li>

                        <li><a href="{{ route('admin.web.village.village') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                গ্রাম
                            </a>
                        </li>

                        <li><a href="{{ route('admin.web.village.house_type') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                বাড়ির ধরন
                            </a>
                        </li>

                        <li><a href="{{ route('admin.web.village.post_office') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                পোস্ট অফিস
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
                @can('role-management')
                    <li
                        class="menu-dropdown">
                        <a href="#">
                           <i class="fa fa-shield" aria-hidden="true"></i> রোল পারমিশন ম্যানেজমেন্ট
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu ">
                            <li class="menu-dropdown">
                                <a href="{{ route('roles.create') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> এড </a>

                            </li>

                            <li class="menu-dropdown">
                                <a href="{{ route('roles.index') }}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> রোল তালিকা </a>

                            </li>

                        </ul>
                    </li>
                @endcan
                @can('user-management')
                    <li class="menu-dropdown">
                        <a href="#">
                           <i class="fa fa-user-plus" aria-hidden="true"></i> ইউজার নিবন্ধন
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu ">
                            <li class="menu-dropdown">
                                <a href="{{route('user.create')}}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> এড </a>

                            </li>

                            <li class="menu-dropdown">
                                <a href="{{route('user.index')}}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> ইউজার তালিকা
                                    </a>

                            </li>


                        </ul>
                    </li>
                @endcan
                @canany(['bosot-bari-list', 'business-hold-list', 'commercial-hold-list'])
                    <li class="menu-dropdown">
                        <a href="javascript:void(0)">
                            <i class="fa fa-list-ul" aria-hidden="true"></i> এসেসমেন্ট নিবন্ধন

                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @can('active-deactive-panel')
                                <li>
                                    <a href="{{ route('action.search') }}"> <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        একটিভ / ডিএকটিভ

                                    </a>
                                </li>
                            @endcan
                            @can('bosot-bari-list')
                                <li class="menu-dropdown">
                                    <a href="#">
                                        <i class="fa fa-building" aria-hidden="true"></i> বসত বাড়ী হোল্ডিং
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{url('new-bosot-index')}}" id="all_bosot_bari"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> মোট ইউজার
                                            </a>
                                        </li>


                                        <li>
                                            <a href="{{url('new-bosot-index-active')}}" id="all_bosot_bari_active">
                                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i> একটিভ ইউজার
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('new-bosot-index-inactive')}}" id="all_bosot_bari_inactive">
                                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i> পেন্ডিং ইউজার
                                            </a>
                                        </li>


                                        <li>
                                            <a href="{{url('new-bosot-index-family')}}">
                                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i> পরিবারের শ্রেণীবিন্যাস
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            @endcan
                            @can('business-hold-list')
                                <li class="menu-dropdown">
                                    <a href="#">
                                        <i class="fa fa-fw ti-receipt"></i> বানিজ্যিক হোল্ডিং
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{url('new-business-holding-index')}}" id="all_bosot_bari"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> মোট ইউজার
                                            </a>
                                        </li>


                                        <li>
                                            <a href="{{url('new-business-holding-index-active')}}"
                                               id="all_bosot_bari_active">
                                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i> একটিভ ইউজার
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('new-business-holding-index-inactive')}}"
                                               id="all_bosot_bari_inactive">
                                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i> পেন্ডিং ইউজার
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            @endcan
                            @can('commercial-hold-list')
                                <li class="menu-dropdown">
                                    <a href="#">
                                        <i class="fa fa-fw ti-receipt"></i> ব্যাবসা প্রতিষ্ঠান
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{url('new-business-index')}}" id="all_bosot_bari"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> মোট ইউজার
                                            </a>
                                        </li>


                                        <li>
                                            <a href="{{url('new-business-index-active')}}" id="all_bosot_bari_active">
                                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i> একটিভ ইউজার
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('new-business-index-inactive')}}"
                                               id="all_bosot_bari_inactive">
                                                <i class="fa fa-dot-circle-o" aria-hidden="true"></i> পেন্ডিং ইউজার
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            @endcan
                        </ul>
                    </li>

                @endcanany
                @can('reports')
                    <li>
                        <a href="{{ route('khosora-report') }}"><i class="fa fa-file" aria-hidden="true"></i>
                            খসড়া রিপোর্ট

                        </a>
                    </li>
                @endcan
                @can('certificate-list')
                    <li class="menu-dropdown">

                        <a href="#">
                           <i class="fa fa-file-pdf-o" aria-hidden="true"></i> রিপোর্ট
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu ">
                            <li class="menu-dropdown">
                                <a href="{{url('puno-bibaho-report')}}"> <i class="fa fa-dot-circle-o" aria-hidden="true"></i> পুন বিবাহ
                                    না হওয়ার সনদ </a>

                            </li>
                            <li class="menu-dropdown">
                                <a href="{{url('warish-report')}}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> ওয়ারিশ সনদ </a>

                            </li>
                            <li class="menu-dropdown">
                                <a href="{{url('new-report')}}"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> নতুন সনদ </a>

                            </li>


                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('sonod.list') }}"> <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            সনদ আবেদন

                        </a>
                    </li>
                @endcan

            </ul>
            <!-- / .navigation -->
        </div>
        <!-- menu -->
    </section>
    <!-- /.sidebar -->
</aside>
