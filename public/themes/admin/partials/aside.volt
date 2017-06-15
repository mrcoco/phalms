<!-- begin .app-side -->
<aside class="app-side">
    <!-- begin .side-content -->
    <div class="side-content">
        <!-- begin user-panel -->
        <div class="user-panel">
            <div class="user-image">
                <a href="#">
                    <img class="img-circle" src="{{ url("themes/admin/") }}assets/img/m1.svg" alt="John Doe">
                </a>
            </div>
            <div class="user-info">
                <h5>{{ auth.getName() }}</h5>
                <ul class="nav">
                    <li class="dropdown">
                        <a href="#" class="text-turquoise small dropdown-toggle bg-transparent" data-toggle="dropdown">
                            <i class="fa fa-fw fa-circle">
                            </i> Online
                        </a>
                        <ul class="dropdown-menu animated flipInY pull-right">
                            <li>
                                {{ link_to('users/changePassword', 'Change Password') }}
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ url("session/logout") }}">
                                    <i class="fa fa-fw fa-sign-out"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: user-panel -->
        <!-- begin .side-nav -->
        <nav class="side-nav">
            <!-- BEGIN: nav-content -->
            <ul class="metismenu nav nav-inverse nav-bordered nav-stacked" data-plugin="metismenu">

                <li class="nav-header">MAIN</li>

                <li>
                    <a class="active" href="{{ url("dashboard") }}">
                    <span class="nav-icon">
                      <i class="fa fa-fw fa-cogs"></i>
                    </span>
                        <span class="nav-title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-divider"></li>
                <li class="nav-header">Components</li>

                <!-- BEGIN: forms -->
                <li>
                    <a href="javascript:;">
                    <span class="nav-icon">
                      <i class="fa fa-fw fa-edit"></i>
                    </span>
                        <span class="nav-title">LMS</span>
                        <span class="nav-tools">
                      <i class="fa fa-fw arrow"></i>
                    </span>
                    </a>
                    <ul class="nav nav-sub nav-stacked">
                        <li>
                            <a href="javascript:;">
                                <span class="nav-title">School Management</span>
                                <span class="nav-tools">
                          <i class="fa fa-fw arrow"></i>
                        </span>
                            </a>
                            <ul class="nav nav-sub">
                                <li>
                                    <a href="{{ url("school") }}">
                                        <span class="nav-title">School </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url("majors") }}">
                                        <span class="nav-title">Majors </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url("grade") }}">
                                        <span class="nav-title">Grade </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url("student") }}">
                                        <span class="nav-title">Student </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <span class="nav-title">Course Management</span>
                                <span class="nav-tools">
                          <i class="fa fa-fw arrow"></i>
                        </span>
                            </a>
                            <ul class="nav nav-sub">
                                <li>
                                    <a href="{{ url("subject") }}">
                                        <span class="nav-title">Subject </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url("classroom") }}">
                                        <span class="nav-title">Class Room</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url("course") }}">
                                        <span class="nav-title">Course </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url("exams") }}">Exams</a>
                        </li>
                        <li>
                            <a href="{{ url("quiz") }}">Quiz</a>
                        </li>
                    </ul>
                </li>
                <!-- END: forms -->
                {% if auth.getIdentity()['profile'] == "Administrators" %}
                <!-- BEGIN: apps -->
                <li>
                    <a href="javascript:;">
                    <span class="nav-icon">
                      <i class="fa fa-fw fa-pagelines"></i>
                    </span>
                        <span class="nav-title">Media</span>
                        <span class="nav-tools">
                      <i class="fa fa-fw arrow"></i>
                    </span>
                    </a>
                    <ul class="nav nav-sub nav-stacked">
                        <li>
                            <a href="{{ url("banner") }}">Banner</a>
                        </li>
                        <li>
                            <a href="{{ url("gallery") }}">Gallery</a>
                        </li>
                    </ul>
                </li>
                <!-- BEGIN: apps -->

                <!-- BEGIN: blank pages -->
                <li>
                    <a href="javascript:;">
                    <span class="nav-icon">
                      <i class="fa fa-fw fa-book text-alizarin"></i>
                    </span>
                        <span class="nav-title">Content</span>
                        <span class="nav-tools">
                      <i class="fa fa-fw arrow"></i>
                    </span>
                    </a>
                    <ul class="nav nav-sub nav-stacked">
                        <li>
                            <a href="{{ url("announcements") }}">Announcements</a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <span class="nav-title">Blog</span>
                                <span class="nav-tools">
                          <i class="fa fa-fw arrow"></i>
                        </span>
                            </a>
                            <ul class="nav nav-sub">
                                <li>
                                    <a href="{{ url("blog") }}">
                                        <span class="nav-title">Blog </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url("blog/category") }}">
                                        <span class="nav-title">Category</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <span class="nav-title">Pages</span>
                                <span class="nav-tools">
                          <i class="fa fa-fw arrow"></i>
                        </span>
                            </a>
                            <ul class="nav nav-sub">
                                <li>
                                    <a href="{{ url("page") }}">
                                        <span class="nav-title">Pages </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url("page/category") }}">
                                        <span class="nav-title">Category</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END: blank pages -->

                <li class="nav-divider"></li>

                <!-- BEGIN: utility -->
                <li>
                    <a href="javascript:;">
                    <span class="nav-icon">
                      <i class="fa fa-fw fa-wrench"></i>
                    </span>
                        <span class="nav-title">Setting</span>
                        <span class="nav-tools">
                      <i class="fa fa-fw arrow"></i>
                    </span>
                    </a>
                    <ul class="nav nav-sub nav-stacked">
                        <li>
                            <a href="{{ url("users") }}">Users</a>
                        </li>
                        <li>
                            <a href="{{ url("profiles") }}">Profile</a>
                        </li>
                        <li>
                            <a href="{{ url("permissions") }}">Permissions</a>
                        </li>
                    </ul>
                </li>
                <!-- BEGIN: utility -->
                <li>
                    <a href="javascript:;">
                    <span class="nav-icon">
                      <i class="fa fa-fw fa-code"></i>
                    </span>
                        <span class="nav-title">Utility</span>
                        <span class="nav-tools">
                      <i class="fa fa-fw arrow"></i>
                    </span>
                    </a>
                    <ul class="nav nav-sub">
                        <li>
                            <a href="{{ url("modules")}}">
                                <span class="nav-title">Module Manager</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url("menu") }}">
                                <span class="nav-title">Menu Manager</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <span class="nav-icon">
                      <i class="fa fa-cogs"></i>
                    </span>
                        <span class="nav-title">Addon Modules</span>
                        <span class="nav-tools">
                      <i class="fa fa-fw arrow"></i>
                    </span>
                    </a>
                    {% if widget.addonmenu() is not empty %}
                    <ul class="nav nav-sub">
                        {% for item in widget.addonmenu() %}
                        <li>
                            <a href="{{ url(item.slug)}}">
                                <span class="nav-title">{{item.name}}</span>
                            </a>
                        </li>
                        {% endfor %}
                        <li></li>
                    </ul>
                    {% endif %}
                </li>
                {% endif %}
            </ul>
            <!-- END: nav-content -->
        </nav>
        <!-- END: .side-nav -->
    </div>
    <!-- END: .side-content -->
    <!-- begin .side-footer -->
    <footer class="side-footer p-h-15 p-t-15 p-b-10">
        <div class="progress is-xs">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                <span class="sr-only">60% Complete</span>
            </div>
        </div>
        <div class="progress is-xs">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                <span class="sr-only">40% Complete</span>
            </div>
        </div>
    </footer>
    <!-- END: .side-footer -->
</aside>
<!-- END: .app-side -->