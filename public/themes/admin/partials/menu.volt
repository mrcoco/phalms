
<nav class="main-menu">
    <ul>
        <li>
            <a href="{{ url() }}">
                <i class="fa fa-home nav_icon"></i>
                <span class="nav-text">
					Dashboard
					</span>
            </a>
        </li>
        <li class="has-subnav">
            <a href="javascript:;">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                <span class="nav-text">
					Setting
				</span>
                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
            </a>
            <ul>
                <li>
                    <a class="subnav-text" href="{{ url("users") }}">
                        Users
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="{{ url("permission") }}">
                        Permission
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="{{ url("profiles") }}">
                        Profile
                    </a>
                </li>
            </ul>
        </li>
        <li class="has-subnav">
            <a href="javascript:;">
                <i class="fa fa-check-square-o nav_icon"></i>
                <span class="nav-text">
				Forms
				</span>
                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
            </a>
            <ul>
                <li>
                    <a class="subnav-text" href="inputs.html">Inputs</a>
                </li>
                <li>
                    <a class="subnav-text" href="validation.html">Form Validation</a>
                </li>
            </ul>
        </li>
        <li class="has-subnav">
            <a href="javascript:;">
                <i class="fa fa-file-text-o nav_icon"></i>
                <span class="nav-text">Pages</span>
                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
            </a>
            <ul>
                <li>
                    <a class="subnav-text" href="{{ url("gallery") }}">
                        Image Gallery
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="{{ url("banner") }}">
                        Banner
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="{{ url("blog") }}">
                        Blog
                    </a>
                </li>
                <li>
                    <a class="subnav-text" href="{{ url("page") }}">
                        Page
                    </a>
                </li>
            </ul>
        </li>
        <li class="has-subnav">
            <a href="javascript:;">
                <i class="fa fa-list-ul" aria-hidden="true"></i>
                <span class="nav-text">Lms</span>
                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
            </a>
            <ul>
                <li>
                    <a class="subnav-text" href="faq.html">FAQ</a>
                </li>
                <li>
                    <a class="subnav-text" href="blank.html">Blank Page</a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="logout">
        <li>
            <a href="{{ url("session/logout") }}">
                <i class="icon-off nav-icon"></i>
                <span class="nav-text">
			Logout
			</span>
            </a>
        </li>
    </ul>
</nav>