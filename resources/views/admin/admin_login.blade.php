<!doctype html>
<html lang="en">

<head>
    <title>Login Panel | {{ @$website_data->title_bangla }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="{{ asset("img/".@$website_data->logo_bangla) }}" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend/styles.css')}}">
</head>

<body>
<div id="login-page">

    <header id="top" class="py-3">
        <div class="container">
            <div class="d-flex flex-row align-items-center">
                <div>
                    <img src="{{ asset("img/".@$website_data->logo_bangla) }}" alt="">
                </div>
                <div class="ml-4">
                    <h6 class="m-0 subtitle">Department of ICT</h6>
                    <h5 class="m-0 title">{{ isset($website_data->title_bangla) ? $website_data->title_bangla : "" }} পৌরসভা ম্যানেজমেন্ট সিষ্টেম</h5>
                </div>
            </div>
        </div>
    </header>

    <section id="login-panel">
        <div class="container">
            <div class="w-100">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="panel py-5">
                        <h4 class="text-center title">LOGIN PANEL</h4>
                        <form action="{{route('admin.login')}}" method="post">
                            @csrf
                            <div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text" id="my-addon"><i
                                                        class="fas fa-user"></i></span>
                                        </div>
                                        <input class="form-control" type="email" name="email" placeholder="Enter Email"
                                               required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                <span class="input-group-text" id="my-addon"><i
                                                        class="fas fa-unlock-alt"></i></span>
                                        </div>
                                        <input class="form-control" type="password" name="password"
                                               placeholder="Enter Password" required>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-block submit-btn">Login</button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>

                <div class="footer-image">
                    <img class="w-100 d-block" src="{{ asset('img/login.svg') }}" alt="">
                </div>

            </div>
        </div>
    </section>


</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="{{asset('js/frontend/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/frontend/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/frontend/custom.js')}}"></script>
<script>
    @if(Session::has('messege'))
    var type = "{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
    @endif
</script>
</body>

</html>
