<!doctype html>
<html lang="en">

<head>
    <title>{{ @$website_data->title_bangla }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="images/svg/logo-white-background.svg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">

    <script type="text/javascript" src="{{ asset('js/admin/app.js') }}"></script>


</head>

<body id="home-page">
    <header id="header">

        <div class="container">
            <div class="header-section"
                style="background-image: url('{{ asset('uploads/header_logo/' . @$website_data->logo_background) }}')">
                <!-- Header Logo Start  -->
                <div id="my-carousel" class="carousel face" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="{{ route('index') }}">
                                <img class="d-block img-fluid" src="{{ asset('uploads/header_logo/' . @$website_data->logo_bangla) }}"
                                    alt="">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="{{ route('index') }}">
                                <img class="d-block img-fluid"
                                    src="{{ asset('uploads/header_logo/' . @$website_data->logo_english) }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Logo End  -->
            </div>
        </div>
    </header>

    <header id="nav-bar" class="sticky-top">
        <div class="container">
            <div>
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <i class="fa fa-home"></i>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    পৌরসভার তথ্য
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('pouro.info') }}">পৌরসভার সংক্ষিপ্ত
                                        বিবরন</a>
                                    <a class="dropdown-item" href="{{ route('munici.org') }}">পৌরসভার সাংগঠনিক
                                        কাঠামো</a>
                                    <a class="dropdown-item" href="{{ route('munici.map') }}">পৌরসভার মানচিত্র</a>
                                    <a class="dropdown-item" href="{{ route('role.honour') }}">সম্মানিত মেয়রদের
                                        তালিকা</a>
                                    <a class="dropdown-item" href="{{ route('munici.emp') }}">পৌরসভার কর্মকর্তা ও
                                        কর্মচারী</a>
                                    <a class="dropdown-item" href="{{ route('edu.info') }}">শিক্ষা বিষয়ক তথ্য</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    জরুরী যোগাযোগ
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('mayor.contact') }}">মেয়রের প্রোফাইল
                                        এবং
                                        সংযোগ</a>
                                    <a class="dropdown-item" href="{{ route('counselor') }}">কাউন্সিলরদের প্রোফাইল
                                        এবং সংযোগ</a>
                                    <a class="dropdown-item" href="{{ route('uno') }}">প্রধান নির্বাহী কর্মকর্তার
                                        প্রোফাইল এবং
                                        সংযোগ</a>
                                    <a class="dropdown-item" href="{{ route('info.center') }}">তথ্য পরিষেবা
                                        কেন্দ্র</a>
                                    <a class="dropdown-item" href="{{ route('administration') }}">প্রশাসন বিভাগ</a>
                                    <a class="dropdown-item" href="{{ route('eng.dept') }}">প্রকৌশল বিভাগ</a>
                                    <a class="dropdown-item" href="{{ route('health') }}">স্বাস্থ্য বিভাগ</a>
                                    <a class="dropdown-item" href="{{ route('contact') }}">যোগাযোগ</a>
                                </div>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    অন্যান্য
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('citizen_chartered') }}">সিটিজেন
                                        চার্টার</a>
                                    <a class="dropdown-item" href="{{ route('once_eye') }}">এক নজরে</a>
                                    <a class="dropdown-item" href="{{ route('notice') }}">নোটিশ</a>
                                    <a class="dropdown-item" href="{{ route('download') }}">ডাউনলোড</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    রেজিস্ট্রেশন
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('reg.bosot-bari') }}">বসতবাড়ী
                                        হোল্ডিং নিবন্ধন</a>

                                    <a class="dropdown-item" href="{{ route('reg.osthai-nagorik') }}">অস্থায়ী নাগরিক
                                        নিবন্ধন</a>

                                    <a class="dropdown-item" href="{{ route('reg.business-hold') }}">বানিজ্যিক
                                        হোল্ডিং নিবন্ধন</a>
                                    <a class="dropdown-item" href="{{ route('reg.business') }}">ব্যবসা
                                        প্রতিষ্ঠান নিবন্ধন</a>
                                </div>
                            </li>

                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </header>
    <section id="marquee">
        <div class="container">
            <div class="marquee">
                <marquee behavior="" direction="">
                    <div>
                        @forelse($marquees as $marquee)
                            <a href="{{ $marquee->link }}">
                                <i class="fa fa-caret-right"></i>
                                {{ $marquee->title }}
                            </a>
                        @empty
                        @endforelse
                    </div>
                </marquee>
                <span class="notice">
                    <i class="mr-2 "></i>
                    স্বাগতম
                </span>
            </div>
        </div>
    </section>
