<!-- begin .app-heading -->
<header class="app-heading">
    <header class="canvas is-fixed is-top bg-white p-v-15 shadow-4dp" id="top-search">

        <div class="container-fluid">
            <div class="input-group input-group-lg icon-before-input">
                <input type="text" class="form-control input-lg b-0" placeholder="Search for...">
                <div class="icon z-3">
                    <i class="fa fa-fw fa-lg fa-search"></i>
                </div>
                <span class="input-group-btn">
                <button data-target="#top-search" data-toggle="canvas" class="btn btn-danger btn-line b-0">
                  <i class="fa fa-fw fa-lg fa-times"></i>
                </button>
              </span>
            </div>
            <!-- /input-group -->
        </div>

    </header>
    <!-- begin .navbar -->
    <nav class="navbar navbar-default navbar-static-top shadow-2dp">
        <!-- begin .navbar-header -->
        <div class="navbar-header">
            <!-- begin .navbar-header-left with image -->
            <div class="navbar-header-left b-r">
                <!--begin logo-->
                <a class="logo" href="../index.html">
                <span class="logo-xs visible-xs">
                  <img src="{{ url("themes/admin/") }}assets/img/logo_xs.svg" alt="logo-xs">
                </span>
                    <span class="logo-lg hidden-xs">
                  <img src="{{ url("themes/admin/") }}assets/img/logo_lg.svg" alt="logo-lg">
                </span>
                </a>
                <!--end logo-->
            </div>
            <!-- END: .navbar-header-left with image -->
            <nav class="nav navbar-header-nav">

                <a class="visible-xs b-r" href="#" data-side=collapse>
                    <i class="fa fa-fw fa-bars"></i>
                </a>

                <a class="hidden-xs b-r" href="#" data-side=mini>
                    <i class="fa fa-fw fa-bars"></i>
                </a>
                

            </nav>

            <ul class="nav navbar-header-nav m-l-a">
                <li class="visible-xs b-l">
                    <a href="#top-search" data-toggle="canvas">
                        <i class="fa fa-fw fa-search"></i>
                    </a>
                </li>
                <li class="dropdown b-l">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                        <span class="b-wisteria fa fa-fw fa-envelope-o u-posRelative"></span>

                        <span class="label label-primary b-orange">8
                    <span class="waves"></span>
                  </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInDown w-sm pull-right">
                        <li class="b-b">
                            <div class="media">
                                <div class="media-left">
                                    <a class="profile-pic" href="#">
                                        <img class="media-object" src="{{ url("themes/admin/") }}assets/img/w2.svg" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">
                                        <small class="pull-right">12 hours ago</small>
                                        <b>Leanne Graham</b>
                                    </h5>
                                    started following
                                    <strong>Ervin Howell </strong>
                                    <p class="text-muted">3 days ago at 7:12 pm - 10.12.2016</p>
                                </div>
                            </div>
                        </li>
                        <li class="b-b">
                            <div class="media">
                                <div class="media-left">
                                    <a class="profile-pic" href="#">
                                        <img class="media-object" src="{{ url("themes/admin/") }}assets/img/m2.svg" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">
                                        <small class="pull-right">12 hours ago</small>
                                        <b>Leanne Graham</b>
                                    </h5>
                                    started following
                                    <strong>Ervin Howell </strong>
                                    <p class="text-muted">3 days ago at 7:12 pm - 10.12.2016</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="text-center u-block text-asbestos" href="app-mail-inbox.html">
                                <i class="fa fa-envelope"></i> Read All Messages
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown b-l">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="point bg-carrot b-peter-river">
                    <span class="waves"></span>
                  </span>
                    </a>
                    <ul class="dropdown-menu pull-right w-sm animated fadeInUp">

                        <li class="p-a-15">
                            <a href="app-mail-inbox.html">
                                <div class="clearfix">
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                    <i class="fa fa-envelope fa-fw"></i>
                                    <small>12 messages</small>
                                </div>
                            </a>
                        </li>
                        <li class="p-a-15">
                            <a href="app-mail-inbox.html">
                                <div class="clearfix">
                                    <span class="pull-right text-muted small">3 minutes ago</span>
                                    <i class="fa fa-twitter fa-fw"></i>
                                    <small>4 follower</small>
                                </div>
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class="text-right">
                            <a class="text-wisteria" href="#">
                                See all notification
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown b-l">
                    <a class="dropdown-toggle profile-pic" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <img class="img-circle" src="{{ url("themes/admin/") }}assets/img/w1.svg" alt="Jane Doe">
                        <b class="hidden-xs hidden-sm">{{ auth.getName() }}</b>
                    </a>
                    <ul class="dropdown-menu animated flipInY pull-right">
                        <li>
                            {{ link_to('users/changePassword', 'Change Password') }}
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="{{ url("session/logout") }}">
                                <i class="fa fa-fw fa-sign-out"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END: .navbar-header -->
    </nav>
    <!-- END: .navbar -->
</header>
<!-- END:  .app-heading -->