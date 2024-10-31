<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0">
            <a href="{{route('dashboard')}}" class="site_title">
                <i class="fa fa-paw"></i> <span>East Java ETourism</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                @if (Auth::user()->image)
                    <img src="{{ asset('storage/users' . Auth::user()->image) }}" alt="..." class="img-circle profile_img" />
                @else
                    <img src="{{asset('assets/img/user.png')}}" alt="..." class="img-circle profile_img" />
                @endif
            </div>
            <div class="profile_info">
                <h2>{{Auth::user()->name}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu menu-fixed">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="{{route('users.index')}}"><i class="fa fa-edit"></i> Users</a>
                    </li>
                    <li>
                        <a href="{{route('destinations.index')}}"><i class="fa fa-desktop"></i> Destinations</a>
                    </li>
                    <li>
                        <a href="{{route('bookings.index')}}"><i class="fa fa-table"></i> Bookings</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('logout')}}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>