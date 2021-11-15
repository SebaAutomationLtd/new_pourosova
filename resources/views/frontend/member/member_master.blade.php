
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ @$website_data->title_bangla }}</title>
    <meta name="description" content="">
    <link rel="apple-touch-icon" href="img/svg/logo-white-background.svg">
    <link rel="icon" type="image/png" href="img/svg/logo-white-background.svg" />
    <!--All CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/responsive.css') }}">

</head>

<body>
    <!--Header Section Start-->
    <section id="nav">
        <div class="container">
            <div class="menu-bar py-2">
                <div class="d-flex">
                    <div class="d-flex align-items-center">
                        <img class="logo" src="{{ asset('user/img/svg/logo-white-background.svg') }}" alt="">
                        <span class="ml-2 ml-sm-3 title">ত্রিশাল পৌরসভা</span>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <div class="user-info-right">
                            <a href="">
                                <img src="{{ asset(Auth::user()->photo ?? 'uploads/users/user.jpg')  }} " alt="">
                            <span class="ml-2 d-none d-sm-inline">{{Auth::user()->name??''}}<i class="fas fa-caret-down"></i> <span
                                class="caret"></span></span>
                            </a>
                            <div class="dropdownmenu">
                                <a href="{{ route('member.dashboard') }}">প্রোফাইল</a>
                                <a href="{{ route('member.change_password')}}">পাসওয়ার্ড পরিবর্তন</a>
                                <a href="">লগআউট</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Header Section End-->


    <!--Banner Section Start-->
    <section id="banner">
        <div class="overlay">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="title">
                        স্বাগতম
                    </div>
                    <div class="ml-auto">
                        প্রোফাইল / এডিট
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Banner Section End-->


    <!--User Profile Section Start-->

    <section id="profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="d-none d-md-block">
                            <div class="user-photo-name text-center">
                                <div class="photo">
                                    <img src="{{ asset(Auth::user()->photo ?? 'uploads/users/user.jpg')  }} " alt="">
                                </div>
                                <div class="name">
                                    <h5>{{Auth::user()->name??''}}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="items">
                            <a href="{{ route('member.dashboard') }}" ><i class="fa fa-bars"></i>প্রোফাইল</a>
                            <a href="#" class=""><i class="fa fa-bars"></i>মাই এ‌সেস‌মেন্ট</a>
                            <a href="{{route('member.seba-apply')}}" class="{{ Request::path() == 'seba-apply' ? 'active' : '' }}" ><i class="fa fa-bars"></i>নাগ‌রিক সেবার আ‌বেদন</a>
                            <a href="#"><i class="fa fa-bars"></i>আ‌বেদনের অবস্থা</a>
                            <a href="#"><i class="fa fa-bars"></i>সনদ ডাউন‌লোড</a>
                            <a href="#"><i class="fa fa-bars"></i>ব‌কেয়া কর প‌রি‌শোধ</a>
                            <a href="#"><i class="fa fa-bars"></i>সকল লেন‌দেন</a>
                            <a href="#"><i class="fa fa-bars"></i>অন্যান্য সেবা</a>
                        </div>
                    </div>
                </div>

                 @yield('member_content')

            </div>
        </div>
    </section>
    <!--User Profile Section End-->


    <footer id="footer" class="mb-5">
        <div class="container">
            <div class="d-flex flex-wrap">
                <div class="left mx-auto mx-sm-0">
                    <div class="mr-2 text">কারিগরি সহযোগিতায় - </div>
                    <a href="">
                    <img class="techpath" src="{{ asset('user/img/svg/Tech Path Limited Logo.svg') }}" alt="">
                    </a>
                </div>
                <div class="ml-auto mt-4 mt-sm-0 mr-auto mr-sm-0">
                    <img class="govt-logo" src="{{ asset('user/img/svg/govt-logo.svg') }}" alt="">
                </div>
            </div>
        </div>
    </footer>

    
<script src="js/jquery-3.5.1.slim.min.js" type="text/javascript"></script>
<script src="{{ asset('user/js/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('user/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('user/js/custom.js') }}" type="text/javascript"></script>
    
    <!-- Toaster -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script>
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif
        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif
        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif
        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>

</body>

</html>