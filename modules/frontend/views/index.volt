<section id="main-slider">
  <div class="owl-carousel">
    {% if widget.banner(2) is not empty %}
    {% for item in widget.banner(2) %}
    <div class="item" style="background-image: url({{ url("upload/banner/"~item.file ) }});">
      <div class="slider-inner">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="carousel-content">
                <h2>{{ item.description }}</h2>
                {{ item.description1 }}
                <a class="btn btn-primary btn-lg" href="{{ item.link }}">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!--/.item-->
    {% endfor %}
    {% endif %}
  </div><!--/.owl-carousel-->
</section><!--/#main-slider-->

<section class="wow fadeIn">
{{ content() }}
</section>
<section id="cta" class="wow fadeIn">
  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <h2>Premium quality free onepage template</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
        </p>
      </div>
      <div class="col-sm-3 text-right">
        <a class="btn btn-primary btn-lg" href="#">Download Now!</a>
      </div>
    </div>
  </div>
</section><!--/#cta-->