
<div class="page-banner no-subtitle">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ name }}</h2>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumbs">
                    <li><a href="{{ url() }}">Home</a></li>
                    <li>{{ name }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row sidebar-page">
            <div class="page-content">
                <div class="hr1" style="margin-bottom:30px;"></div>
                <div class="row latest-posts-classic">
                    <h4 class="classic-title"><span>{{ name }} Page</span></h4>
                    {% for item in category %}
                    <div class="col-md-4 post-row">
                        <div class="left-meta-post">
                            <div class="post-date"><span class="day">{{ item.date }}</span><span class="month">{{ item.month }}</span></div>
                            <div class="post-type"><i class="fa fa-picture-o"></i></div>
                        </div>
                        <h3 class="post-title"><a href="http://{{ config.application.publicUrl }}{{ url("pages/"~item.slug) }}">{{ item.title }}</a></h3>
                        <div class="post-content">
                            <p>{{ item.intro }} <a class="read-more" href="http://{{ config.application.publicUrl }}{{ url("news/"~item.slug) }}">Read More...</a></p>
                        </div>
                    </div>
                    {%  endfor %}
                </div>
            </div>
        </div>
    </div>
</div>