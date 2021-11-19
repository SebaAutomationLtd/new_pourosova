<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="" class="logo text-left">
            <!-- Add the class icon to your logo image or logo icon to add the marginin -->
            <img style="max-width: 210px;" src="{{ asset('img/'. ($website_data->logo ?? 'govt.png')) }}" alt="logo" width="40" />
        </a>
        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <div class="mr-auto">
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw ti-menu"></i>
            </a>
        </div>
        @include('admin.layout.inc.right-sidebar')
    </nav>
</header>
