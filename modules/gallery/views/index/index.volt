<!-- Start Portfolio Section -->
<section id="portfolio" class="section">
    <div class="container">
        <div class="row">
            <div class="heading">
                <div class="section-title">Galleri <span>Foto</span></div>
            </div>
            <!-- End Heading -->
            <!-- Portfolio controls -->
            <div class="controls text-center">
                <a class="filter active" data-filter="all">All</a>
                {% if gallery %}
                    {% for gal in gallery %}
                <a class="filter" data-filter=".gal-{{ gal.id }}">{{ gal.title }}</a>
                    {% endfor %}
                {% endif %}
            </div>
            <!-- End Portfolio Controls -->
        </div>
    </div>
    <!-- Portfolio Recent Projects -->
    {% if image.items %}
    <div id="portfolio-list">
            {% for im in image.items %}
        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 mix gal-{{ im.gallery.id }}">
            <div class="portfolio-item">
                <img src="{{ url("upload/gallery/"~im.gallery.path~"/"~im.file_name) }}" height="250px" alt="" />
                <div class="overlay">
                    <div class="icon">
                        <a href="{{ url("upload/gallery/"~im.gallery.path~"/"~im.file_name) }}"><i class="icon-pointer left"></i></a>
                        <a href="{{ url("upload/gallery/"~im.gallery.path~"/"~im.file_name) }}" class="lightbox"><i class="icon-magnifier right"></i></a>
                    </div>
                </div>
                <div class="content">
                    <h3><a href="#">{{ im.title }}</a></h3>
                    {{ im.description }}
                </div>
            </div>
        </div>
            {% endfor %}

    </div>
    <!-- End Portfolio  -->
    {% endif %}
</section>
<!-- End Portfolio Section -->
<div class="container" style="padding-top: 30px; padding-bottom: 30px; text-align: center;">
    <div class="row">
        <!-- Start Pagination -->
        <div id="pagination">
            <span class="current page-num"><i class="icon-fast-backward"></i> Awal</span>
            <a class="next-page" href="?p={{ image.before }}"><i class="icon-step-backward"></i> Sebelumnya</a>
            <a class="next-page" href="?p={{ image.next }}"><i class="icon-step-forward"></i> Selanjutnya</a>
            <a class="next-page" href="?p={{ image.last }}"><i class="icon-fast-forward"></i> Akhir</a>
            <a class="next-page" href="#">{{ image.current }} / {{ image.total_pages }}</a>
        </div>
        <!-- End Pagination -->
    </div>
</div>