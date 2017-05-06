<div class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Program</h2>
                <p>{{ data.title }}</p>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumbs">
                    <li><a href="{{ url() }}">Home</a></li>
                    <li>Program</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="content">
    <div class="container">
        <div class="page-content">
            <div class="row">
                <div class="col-md-7">

                    <h4 class="classic-title"><span>{{ data.title }}</span></h4>
                    <div class="touch-slider" data-slider-navigation="true" data-slider-pagination="true">
                        <div class="item"><img alt="" src="http://{{ config.application.publicUrl }}{{ url("upload/program/"~data.image) }}"></div>
                    </div>

                    <div class="hr1" style="margin-bottom:50px;"></div>
                    <div>
                        {{ data.content }}
                    </div>

                </div>
                <div class="col-md-5">

                    <h4 class="classic-title"><span>Donation</span></h4>
                    <div>
                        {{ content() }}
                    </div>
                    <div class="panel-group" id="accordion">
                        <div class="call-action call-action-boxed call-action-style1 clearfix">
                            <form id="contactForm" role="form" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label class="control-label" for="name">Nama</label>
                                                <input class="form-control" name="name" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label class="control-label" for="phone">No HP</label>
                                                <input class="form-control" name="phone" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label class="control-label" for="email">Email</label>
                                                <input class="form-control" name="email" type="email">
                                            </div>
                                        </div>
                                        <div class="controls">
                                            <label class="control-label" for="inputError1">Pembayaran</label>
                                            <select class="form-control" name="bank_dest">
                                                <option value="BNI">BNI</option>
                                                <option value="Mandiri">Mandiri Syariah</option>
                                                <option value="BCA">BCA</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label class="control-label" for="type">Jenis Donasi</label>
                                                <select class="form-control" name="donation_type">
                                                    <option value="Infak">Infak</option>
                                                    <option value="Zakat">Zakat</option>
                                                    <option value="Hibah">Hibah</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label class="control-label" for="donation">Donasi</label>
                                                <input class="form-control" name="donation" type="text" id="donation">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <label class="control-label" for="inputError1">alamat</label>
                                        <input class="form-control" name="address" type="text">
                                    </div>
                                </div>
                                <button type="submit" id="submit" class="btn-system btn-large">Send</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

            <div class="hr1" style="margin-bottom:50px;"></div>
            <div class="row">
                <div class="col-md-6">

                    <h4 class="classic-title"><span> {{ data.location }}</span></h4>
                    <div class="skill-shortcode">
                        <div class="skill">
                            <p><b>Periode</b> {{ data.periode }} Bulan / {{ data.count_day }} Hari <br>
                                <b>Mulai</b> <a class="btn-system btn-mini border-btn">{{ data.start }} </a>
                                <b>Berakhir</b> <a class="btn-system btn-mini border-btn">{{ data.end }}</a> <a class="btn-system btn-mini">{{ data.expired }} Hari lagi</a>
                            </p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-percentage="{{ data.remaining }}">
                                    <span class="progress-bar-span">{{ data.remaining }}%</span>
                                    <span class="sr-only">{{ data.remaining }}% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="skill">
                            <p><b>Penerima Manfaat</b> <a class="btn-system btn-mini"><i class="fa fa-users" aria-hidden="true"></i>
                                    {{ data.benefit }} Orang</a> </p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-percentage="{{ data.percentage }}">
                                    <span class="progress-bar-span">{{ data.percentage }}%</span>
                                    <span class="sr-only">{{ data.percentage }}% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="skill">
                            <p><b>Kebutuhan </b> <a class="btn-system btn-mini border-btn">{{ data.requirement }}</a> <b>Tercapai  </b> <a class="btn-system btn-mini border-btn">{{ data.achievements }}</a></p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" data-percentage="{{ data.percentage }}">
                                    <span class="progress-bar-span">{{ data.percentage }}%</span>
                                    <span class="sr-only">{{ data.percentage }}% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="classic-title"><span>Selected Program</span></h4>
                    <div class="latest-posts-classic custom-carousel touch-carousel" data-appeared-items="2">
                        {% for item in widget.program() %}
                        <div class="post-row item">
                            <div class="left-meta-post">
                                <div class="post-date"><span class="day">{{ item.start_day }}</span><span class="month">{{ item.start_mon }}</span></div>
                                <div class="post-type"><i class="fa fa-picture-o"></i></div>
                            </div>
                            <h3 class="post-title"><a href="http://{{ config.application.publicUrl }}{{ url("programs/"~item.slug) }}">{{ item.title }}</a></h3>
                            <div class="post-content">
                                <p>{{ item.intro }} <a class="read-more" href="http://{{ config.application.publicUrl }}{{ url("programs/"~item.slug) }}">Read More...</a></p>
                            </div>
                        </div>
                        {% endfor %}
                    </div>
                </div>
                    <div class="post-share">
                        <span>Share This:</span>
                        <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                        <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                        <a class="gplus" href="#"><i class="fa fa-google-plus"></i></a>
                        <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                        <a class="mail" href="#"><i class="fa fa-envelope"></i></a>
                    </div>


                </div>
            </div>
    </div>
</div>
<script>
    $('#donation').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
</script>
