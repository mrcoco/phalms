<header id="header">
    <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url() }}"><img src="{{ url("themes/frontend/images/logo.png") }}" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="scroll active"><a href="{{ url() }}">Home</a></li>
                    {% if widget.frontmenu() %}
                        {% for item in widget.frontmenu() %}
                        <li class="scroll"><a href="{{ url(item.url) }}">{{ item.name }}</a></li>
                        {% endfor %}
                    {% endif %}
                    <li class="scroll active"><a href="{{ url("session/login") }}">login</a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->
</header><!--/header-->
