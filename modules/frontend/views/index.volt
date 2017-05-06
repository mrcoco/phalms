{{ content() }}
<!-- Start Home Page Slider -->
    <section id="home">
      <!-- Carousel -->
      <div id="main-slide" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#main-slide" data-slide-to="0" class="active"></li>
          <li data-target="#main-slide" data-slide-to="1"></li>
          <li data-target="#main-slide" data-slide-to="2"></li>
        </ol>
        <!--/ Indicators end-->

        <!-- Carousel inner -->
        <div class="carousel-inner">
        {% for item in widget.banner() %}
        {% set no = loop.index %}
          {% if loop.first %}
          <div class="item active">
          {% else %}
          <div class="item">
          {% endif %}
            <img class="img-responsive" src="upload/banner/{{ item.file }}" alt="slider">
            <div class="slider-content">
              <div class="col-md-12 text-center">
                <h2 class="animated{{ no+1 }}">
                              <span><strong>{{item.description}}</strong></span>
                              </h2>
                <h3 class="animated{{ no+2 }}">
                                <span>{{item.description1}}</span>
                              </h3>
                <p class="animated{{ no+3 }}"><a href="{{ item.link }}" class="slider btn btn-system btn-large">Donate</a>
                </p>
              </div>
            </div>
          </div>
          <!--/ Carousel item end -->
          {% endfor %}          
        </div>
        <!-- Carousel inner end-->

        <!-- Controls -->
        <a class="left carousel-control" href="#main-slide" data-slide="prev">
          <span><i class="fa fa-angle-left"></i></span>
        </a>
        <a class="right carousel-control" href="#main-slide" data-slide="next">
          <span><i class="fa fa-angle-right"></i></span>
        </a>
      </div>
      <!-- /carousel -->
    </section>
    <!-- End Home Page Slider -->

    <!-- Start Services Section -->
    <div class="section service">
      <div class="container">
        <div class="row">
        {% for item in widget.service() %}
        {% set no = loop.index %}
          <div class="col-md-3 col-sm-6 image-service-box" data-animation="fadeIn" data-animation-delay="0{{ no }}">
            <a href="http://{{ config.application.publicUrl }}{{ url("pages/"~item.pages.slug) }}"> <img class="img-thumbnail" src="upload/service/{{item.thumb}}" alt=""></a>
            <h4>{{item.title}}</h4>
            <p>{{item.content}}</p>

          </div>
          {% endfor %}

        </div>
        <!-- .row -->
        
      </div>
      <!-- .container -->
    </div>
    <!-- End Services Section -->

    <!-- Start Team Member Section -->
    <div class="section" style="background:#fff;">
      <div class="container">

        <!-- Start Big Heading -->
        <div class="big-title text-center" data-animation="fadeInDown" data-animation-delay="01">
          <h1>SELECTION <strong>PROGRAM</strong></h1>
        </div>
        <!-- End Big Heading -->

        <!-- Some Text -->
        <p class="text-center">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium <span class="accent-color sh-tooltip" data-placement="right" title="Simple Tooltip">doloremque laudantium</span>, totam rem aperiam, eaque ipsa quae ab illo inventore
          <br/>veritatis et quasi <span class="accent-color sh-tooltip" data-placement="bottom" title="Simple Tooltip">architecto</span> beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>


        <!-- Start Team Members -->
        <div class="row">
          {% for item in widget.program() %}
          <!-- Start Memebr 1 -->
          <div class="col-md-3 col-sm-6 col-xs-12" data-animation="fadeIn" data-animation-delay="03">
            <div class="team-member modern">
              <!-- Memebr Photo, Name & Position -->
              <a href="http://{{ config.application.publicUrl }}{{ url("programs/"~item.slug) }}">
              <div class="member-photo">
                  {% if item.image is defined %}
                  <img alt="" src="upload/program/{{ item.image }}" />
                      {% else %}
                        <img alt="" src="{{ url("zfl-theme/images/team/face_1.png") }}" />
                  {% endif %}
                <div class="member-name">{{ item.title }} <span>{{ item.locations.name }}</span>
                </div>
              </div>
              </a>
              <!-- Memebr Words -->
              <div class="member-info">
                {{ item.intro }}
              </div>
              <!-- Start Progress Bar 1 -->
              <div class="progress-label">Periode :<em> {{ item.periode }}Bulan</em></div>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-progress-animation="96%" data-appear-animation-delay="400">
                  <span class="percentage">96%</span>
                </div>
              </div>
              <!-- Start Progress Bar 2 -->
              <div class="progress-label">Penerima Manfaat :<em> {{ item.benefit }} Orang</em></div>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-progress-animation="88%" data-appear-animation-delay="800">
                  <span class="percentage">88%</span>
                </div>
              </div>
              <!-- Start Progress Bar 3 -->
              <div class="progress-label">Ketercapaian :<em> {{ item.percentage }}% - {{ item.achievements }}</em></div>
              <div class="progress">
                <div class="progress-bar progress-bar-primary" data-progress-animation="{{ item.percentage }}%" data-appear-animation-delay="1200">
                  <span class="percentage">{{ item.percentage }}%</span>
                </div>
              </div>
              <!-- Memebr Social Links -->
              <div class="member-socail">
                <a class="twitter popup" href="https://twitter.com/share?url=http://{{ config.application.publicUrl }}{{ url("programs/"~item.slug) }}"><i class="fa fa-twitter"></i></a>
                <a class="facebook popup" href="http://www.facebook.com/sharer.php?u=http://{{ config.application.publicUrl }}{{ url("programs/"~item.slug) }}"><i class="fa fa-facebook"></i></a>
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
          <!-- End Memebr 1 -->
          {% endfor %}

        </div>
        <!-- End Team Members -->

      </div>
      <!-- .container -->
    </div>
    <!-- End Team Member Section -->
    


    <!-- Start Testimonials Section -->
    <div>
      <div class="container">
        <div class="row">
          <div class="col-md-8">

            <!-- Start Recent Posts Carousel -->
            <div class="latest-posts">
              <h4 class="classic-title"><span>Latest News</span></h4>
              <div class="latest-posts-classic custom-carousel touch-carousel" data-appeared-items="2">

                <!-- Posts 1 -->
                {% if not (widget.news() is empty) %}
                {% for item in widget.news() %}
                <div class="post-row item">
                  <div class="left-meta-post">
                    <div class="post-date"><span class="day">{{ item.date }}</span><span class="month">{{ item.month }}</span></div>
                    <div class="post-type"><i class="fa fa-picture-o"></i></div>
                  </div>
                  <h3 class="post-title"><a href="http://{{ config.application.publicUrl }}{{ url("news/"~item.slug) }}">{{ item.title }}</a></h3>
                  <div class="post-content">
                    <p>{{ item.intro }} <a class="read-more" href="http://{{ config.application.publicUrl }}{{ url("news/"~item.slug) }}">Read More...</a></p>
                  </div>
                </div>
                {% endfor %}
                {% endif %}
              </div>
            </div>
            <!-- End Recent Posts Carousel -->

          </div>

          <div class="col-md-4">

            <!-- Classic Heading -->
            <h4 class="classic-title"><span>Inspiring Story</span></h4>

            <!-- Start Testimonials Carousel -->
            <div class="custom-carousel show-one-slide touch-carousel" data-appeared-items="1">
              {% for item in widget.story() %}
              <!-- Testimonial 1 -->
              <div class="classic-testimonials item">
                <div class="testimonial-content">
                  <p>{{ item.intro }}</p>
                </div>
                <div class="testimonial-author"><span>{{ item.users }}</span> - Customer</div>
              </div>
              {% endfor %}
            </div>
            <!-- End Testimonials Carousel -->

          </div>
        </div>
      </div>
    </div>
    <!-- End Testimonials Section -->


    <!-- Start Client/Partner Section -->
    <div class="partner">
      <div class="container">
        <div class="row">

          <!-- Start Big Heading -->
          <div class="big-title text-center">
            <h1>Our Happy <strong>Clients</strong></h1>
            <p class="title-desc">Partners We Work With</p>
          </div>
          <!-- End Big Heading -->

          <!--Start Clients Carousel-->
          <div class="our-clients">
            <div class="clients-carousel custom-carousel touch-carousel navigation-3" data-appeared-items="5" data-navigation="true">

              {% for item in widget.image() %}
              <!-- Client 1 -->
              <div class="client-item item">
                <a href="upload/galleries/{{ item.gallery.path }}/{{ item.file_name }}"><img src="upload/galleries/{{ item.Gallery.path }}/{{ item.file_name }}" alt="" /></a>
              </div>
              {% endfor %}

            </div>
          </div>
          <!-- End Clients Carousel -->
        </div>
        <!-- .row -->
      </div>
      <!-- .container -->
    </div>
    <!-- End Client/Partner Section -->