<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Panel</title>


    <link rel="shortcut icon" href="{{asset('img/logo.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('user/user-login/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user/user-login/css/all.min.css')}}" />
    <script src="{{asset('user/user-login/js/jquery-3.5.1.slim.min.js')}}"></script>
    <script src="{{asset('user/user-login/js/custom.js')}}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
</head>

<body>
    <div class="wrapper">
        <div class="login-page">
            <div class="form">
                <div class="" style="margin-bottom: 10px;">
                    <img width="80" src="{{asset('img/logo.svg')}}" alt="">
                </div>
                <form class="login-form" method="post" action="{{route('member.login')}}" method="post">
                  @csrf
                    <input class="bn-font" type="text" name="username" placeholder="কার্ড নম্বর"
                        autocomplete="off" required="required" />
                    <div class="relative">
                        <input class="bn-font" name="password" type="password" name="password" placeholder="পিন"
                            autocomplete="off" required="required" />
                        <i class="fa fa-eye show-password"></i>
                    </div>
                    <button class="bn-font font-16" type="submit">লগইন </button>
                </form>


            </div>
            <div class="thanksto">
                <img src="{{asset('img/login.svg')}}" alt="thanks to" />
            </div>
        </div>
        <div class="credit-info">
            <img class="logo" src="{{asset('user-login/images/svg/Tech Path Limited Logo.svg')}}">
            <div class="developed bn-font">কারিগরি সহযোগিতায়: <a href="#" target="_blank"><span
                        class="orange-color">Techpath Limited</a></div>
        </div>
        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



<script>
      @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('message') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
      @endif
    </script>
</body>

</html>
