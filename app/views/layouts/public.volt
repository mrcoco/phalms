<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>

  <!-- Basic -->
  <title>Zakat For Life</title>

  <!-- Define Charset -->
  <meta charset="utf-8">

  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Page Description and Author -->
  <meta name="description" content="Zfl-theme- Responsive HTML5 Template">
  <meta name="author" content="cempakaweb">

  <!-- Bootstrap CSS  -->
  {{ stylesheet_link(["zfl-theme/asset/css/bootstrap.min.css","media":"screen"]) }}
  <!-- Font Awesome CSS -->
  {{ stylesheet_link(["zfl-theme/css/font-awesome.min.css","media":"screen"]) }}
  <!-- Slicknav -->
  {{ stylesheet_link(["zfl-theme/css/slicknav.css","media":"screen"]) }}
  <!-- Margo CSS Styles  -->
  {{ stylesheet_link(["zfl-theme/css/style.css","media":"screen"]) }}
  <!-- Responsive CSS Styles  -->

  <!-- Css3 Transitions Styles  -->
  {{ stylesheet_link(["zfl-theme/css/animate.css","media":"screen"]) }}
  <!-- Color CSS Styles  -->  
  {{ stylesheet_link(["zfl-theme/css/colors/jade.css","media":"screen"]) }}

  <!-- Margo JS  -->
  
  {{ javascript_include("zfl-theme/js/jquery-2.1.4.min.js") }}
  
  {{ javascript_include("zfl-theme/js/jquery.migrate.js") }}
  
  {{ javascript_include("zfl-theme/js/modernizrr.js") }}
  
  {{ javascript_include("zfl-theme/asset/js/bootstrap.min.js") }}
  
  {{ javascript_include("zfl-theme/js/jquery.fitvids.js") }}
  
  {{ javascript_include("zfl-theme/js/owl.carousel.min.js") }}
  
  {{ javascript_include("zfl-theme/js/nivo-lightbox.min.js") }}
  
  {{ javascript_include("zfl-theme/js/jquery.isotope.min.js") }}
  
  {{ javascript_include("zfl-theme/js/jquery.appear.js") }}
  
  {{ javascript_include("zfl-theme/js/count-to.js") }}
  
  {{ javascript_include("zfl-theme/js/jquery.textillate.js") }}
  
  {{ javascript_include("zfl-theme/js/jquery.lettering.js") }}
  
  {{ javascript_include("zfl-theme/js/jquery.easypiechart.min.js") }}
  
  {{ javascript_include("zfl-theme/js/jquery.nicescroll.min.js") }}
  
  {{ javascript_include("zfl-theme/js/jquery.parallax.js") }}
  
  {{ javascript_include("zfl-theme/js/mediaelement-and-player.js") }}
  
  {{ javascript_include("zfl-theme/js/jquery.slicknav.js") }}
  {{ javascript_include('admin/js/jquery.maskMoney.js') }}
  <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>

<body>

  <!-- Full Body Container -->
  <div id="container">


    <!-- Start Header Section -->
    <div class="hidden-header"></div>
    <header class="clearfix">

      <!-- Start Top Bar -->
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <!-- .col-md-6 -->
            <div class="col-md-9">
            </div>
            <!-- .col-md-6 -->
            <div class="col-md-3">
              <!-- Start Contact Info -->
              <ul class="contact-details">
                  {%- if not(logged_in is empty) %}
                    <li>
                        {{ link_to("users", '<i class="fa fa-user"></i> user panel') }}
                    </li>
                    <li>
                        {{ link_to("session/logout", '<i class="fa fa-sign-out"></i> logout') }}
                    </li>
                  {% else %}
                <li>
                  {{ link_to("session/login", '<i class="fa fa-sign-in"></i> login') }}
                </li>
                <li>
                  {{ link_to("session/signup", '<i class="fa fa-user"></i> registration') }}            
                </li>
                  {% endif %}
                <li>
                  {{ link_to("confirmation", '<i class="fa fa-usd"></i> confirm payment') }}
                </li>
              </ul>
              <!-- End Contact Info -->
            </div>                                      
          </div>
          <!-- .row -->
        </div>
        <!-- .container -->
      </div>
      <!-- .top-bar -->
      <!-- End Top Bar -->


      <!-- Start  Logo & Naviagtion  -->
      <div class="navbar navbar-default navbar-top">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a class="navbar-brand" href="{{ url() }}">
              {{ image("zfl-theme/images/logo.png") }}
            </a>
          </div>
          <div class="navbar-collapse collapse">        
            <!-- End Search -->
            <!-- Start Navigation List -->
            <ul class="nav navbar-nav navbar-right">
                {% for menu in widget.pagecat() %}
                {% if loop.first %}
                  <li>
                  <a class="active" href="{{ menu.id }}">{{ menu.name }}</a>
                {% else %}
                  <li>
                  <a href="#">{{ menu.name }}</a>
                {% endif %}
                    <ul class="dropdown">
                      {% for item in menu.page %}
                      <li><a href="http://{{ config.application.publicUrl }}{{ url("pages/"~item.slug) }}">{{ item.title }}</a>
                      </li>
                      {% endfor %}
                    </ul>
                {% if loop.last %}
                  </li>
                {% endif %}
                {% endfor %}
            </ul>
            <!-- End Navigation List -->
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
          <li>
            <a class="active" href="{{ url() }}">Home</a>
          </li>
            {% for menu in widget.pagecat() %}
                {% if loop.first %}
                  <li>
                  <a class="active" href="{{ menu.id }}">{{ menu.name }}</a>
                {% else %}
                  <li>
                  <a href="#">{{ menu.name }}</a>
                {% endif %}
              <ul class="dropdown">
                  {% for item in menu.page %}
                    <li><a href="http://{{ config.application.publicUrl }}{{ url("pages/"~item.slug) }}">{{ item.title }}</a>
                    </li>
                  {% endfor %}
              </ul>
                {% if loop.last %}
                  </li>
                {% endif %}
            {% endfor %}
        </ul>
        <!-- Mobile Menu End -->

      </div>
      <!-- End Header Logo & Naviagtion -->

    </header>
    <!-- End Header Section -->

    {{ content()}}
    
    <!-- Start Footer Section -->
    <footer>
      <div class="container">
        <div class="row footer-widgets">


          <!-- Start Subscribe & Social Links Widget -->
          <div class="col-md-3 col-xs-12">
            <div class="footer-widget contact-widget">

              <h4>{{ image("zfl-theme/images/logo.png", "alt": "Footer Logo", "class":"img-responsive") }}</h4>
              <p>Pusat BaitulMal FKAM</p>
              <p>Jl. Slamet Riyadi, Gang Bakung No. 287 02/VI, Purwonegaran, Laweyan, Surakarta.</p>
              <ul>
                <li><span>Phone Number:</span> +01 234 567 890</li>
                <li><span>Email:</span> contact@zakatforlife.com</li>
                <li><span>Website:</span> www.zakatforlife.com</li>
              </ul>
            </div>

          </div>
          <!-- .col-md-3 -->
          <!-- End Subscribe & Social Links Widget -->


          <!-- Start Twitter Widget -->
          <div class="col-md-3 col-xs-12">
            <div class="footer-widget mail-subscribe-widget">
              <h4>Get in touch<span class="head-line"></span></h4>
              <p>Join our mailing list to stay up to date and get notices about our new releases!</p>
              <form class="subscribe" method="post" action="{{ url("subscribe") }}">
                <input type="email" name="email" placeholder="mail@example.com">
                <input type="submit" class="btn-system" value="Send">
              </form>
            </div>
            <div class="footer-widget social-widget">
              <h4>Follow Us<span class="head-line"></span></h4>
              <ul class="social-icons">
                <li>
                  <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a class="google" href="#"><i class="fa fa-google-plus"></i></a>
                </li>
                <li>
                  <a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                </li>
                <li>
                  <a class="linkdin" href="#"><i class="fa fa-linkedin"></i></a>
                </li>
                <li>
                  <a class="flickr" href="#"><i class="fa fa-flickr"></i></a>
                </li>
                <li>
                  <a class="tumblr" href="#"><i class="fa fa-tumblr"></i></a>
                </li>
                <li>
                  <a class="instgram" href="#"><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                  <a class="vimeo" href="#"><i class="fa fa-vimeo-square"></i></a>
                </li>
                <li>
                  <a class="skype" href="#"><i class="fa fa-skype"></i></a>
                </li>
              </ul>
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Twitter Widget -->

          <!-- Start Twitter Widget -->
          <div class="col-md-3 col-xs-12">
            <div class="footer-widget twitter-widget">
              <div class='twitter-block'>
                <a class="twitter-timeline" data-theme="dark" data-tweet-limit="3" data-chrome="nofooter noborders" href="https://twitter.com/ZakatForLife">Tweets by ZakatForLife</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
              </div>
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Twitter Widget -->


          <!-- Start Contact Widget -->
          <div class="col-md-3 col-xs-12">
            <div class="footer-widget flickr-widget">
              <h4>Instagram<span class="head-line"></span></h4>
              <ul class="flickr-list">
                {% for item in widget.instagram() %}
                  <li><div style="height: 75px"><a href="{{ item.link }}"><img src="{{ item.imageThumbnailUrl }}" style="width: 100%;max-height: 100%"></a></div></li>
                {% endfor %}
              </ul>
            </div>
          </div>
          <!-- .col-md-3 -->
          <!-- End Contact Widget -->


        </div>
        <!-- .row -->

        <!-- Start Copyright -->
        <div class="copyright-section">
          <div class="row">
            <div class="col-md-6">
              <p>&copy; 2017 Zakat For Life - All Rights Reserved <a rel="nofollow" href="http://baitulmalfkam.com/">baitulmalfkam</a> </p>
            </div>
            <!-- .col-md-6 -->
            <div class="col-md-6">
              <ul class="footer-nav social-icons">
                <li>
                  <a class="facebook" href="https://www.facebook.com/zakatforlife"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a class="twitter" href="https://www.twitter.com/zakatforlife"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a class="instgram" href="https://www.instagram.com/zakatforlife"><i class="fa fa-instagram"></i></a>
                </li>
              </ul>
            </div>
            <!-- .col-md-6 -->
          </div>
          <!-- .row -->
        </div>
        <!-- End Copyright -->

      </div>
    </footer>
    <!-- End Footer Section -->


  </div>
  <!-- End Full Body Container -->

  <!-- Go To Top Link -->
  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <div id="loader">
    <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>
  </div>

  {{ javascript_include("zfl-theme/js/script.js") }}
</body>
<script type="text/javascript">

    jQuery('.twitter-block').delegate('#twitter-widget-0','DOMSubtreeModified propertychange', function() {

        hideTweetMedia();

    });
    var hideTweetMedia = function() {

        jQuery('.twitter-block').find('.twitter-timeline').contents().find('.timeline-Tweet-media').css('display', 'none');

        jQuery('.twitter-block').css('height', '250%');

        jQuery('.twitter-block').find('.twitter-timeline').contents().find('.timeline-TweetList').bind('DOMSubtreeModified propertychange', function() {

            hideTweetMedia(this);

        });

    }
</script>
</html>