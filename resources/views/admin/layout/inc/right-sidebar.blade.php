<div class="navbar-right">
    <ul class="nav navbar-nav">


        <!-- User Account: style can be found in dropdown-->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle padding-user d-block" data-toggle="dropdown">
                <img src="{{ asset(Auth::user()->photo) }}" onerror="this.src='{{ asset("img/avatar.png") }}'" width="28"
                    class="rounded-circle img-fluid float-left" height="20" alt="User Image">
                <div class="riot">
                    <div>
                        {{ auth()->user()->name ?? '' }}
                        <span><i class="fa fa-sort-down"></i></span>
                    </div>
                </div>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img src="{{ asset(Auth::user()->photo ?? 'uploads/users/user.jpg') }}" class="rounded-circle" alt="User Image">
                    <p> {{ auth()->user()->name ?? '' }}</p>
                </li>
                <!-- Menu Body -->



                <li><a href="{{ route('admin.setting.change_email') }}" class="dropdown-item"><i class="fa fa-fw ti-settings"></i>
                        Email Change </a></li>

                <li><a href="{{ route('admin.setting.change_password') }}" class="dropdown-item"><i class="fa fa-fw ti-settings"></i>
                        Password Change </a></li>
                <li role="presentation" class="dropdown-divider"></li>
                <!-- Menu Footer-->
                <li class="user-footer">

                    <div class="float-right">
                        <a href="{{ route('admin.logout') }}">
                            <i class="fa fa-fw ti-shift-right"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>
