{{ content() }}
<div class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ story.categories.name }}</h2>
                <p>{{ story.title }}</p>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumbs">
                    <li><a href="{{ url() }}">Home</a></li>
                    <li>story</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="content">
    <div class="container">
        <div class="row blog-page">
            <div class="col-md-9 blog-box">
                <div class="blog-post image-post">
                    <div class="post-head">
                        <a class="lightbox" title="This is an image title" href="http://{{ config.application.publicUrl }}{{ url("upload/blog/"~story.image) }}">
                            <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                            <img alt="" src="http://{{ config.application.publicUrl }}{{ url("upload/blog/"~story.image) }}">
                        </a>
                    </div>

                    <div class="post-content">
                        <div class="post-type"><i class="fa fa-picture-o"></i></div>
                        <h2><a href="#">{{ story.title }}</a></h2>
                        <ul class="post-meta">
                            <li>By <a href="#">{{ story.users.name }}</a></li>
                            <li>{{ story.created }}</li>
                        </ul>
                        {{ story.content }}
                    </div>
                    <div class="post-bottom clearfix">
                        <div class="post-share">
                            <span>Share This story:</span>
                            <a class="facebook popup" href="http://www.facebook.com/sharer.php?u=http://{{ config.application.publicUrl }}{{ url("story/"~story.slug) }}"><i class="fa fa-facebook"></i></a>
                            <a class="twitter popup" href="https://twitter.com/share?url=http://{{ config.application.publicUrl }}{{ url("story/"~story.slug) }}"><i class="fa fa-twitter"></i></a>
                            <script>
                                $('.popup').click(function(event) {
                                    var width  = 575,
                                        height = 400,
                                        left   = ($(window).width()  - width)  / 2,
                                        top    = ($(window).height() - height) / 2,
                                        url    = this.href,
                                        opts   = 'status=1' +
                                            ',width='  + width  +
                                            ',height=' + height +
                                            ',top='    + top    +
                                            ',left='   + left;

                                    window.open(url, 'twitter', opts);

                                    return false;
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 sidebar right-sidebar">
                <div class="widget widget-categories">
                    <h4>Category <span class="head-line"></span></h4>
                    <ul>
                        {% for item in category %}
                            <li>
                                <a href="http://{{ config.application.publicUrl }}{{ url("news-cat/"~item.slug) }}">{{ item.name }}</a>
                            </li>
                        {% endfor %}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>