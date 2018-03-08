<div id="content">
    <div class="container">
        <div>{{ content() }}</div>
        <div class="row">
            <div class="col-md-8">

                <h4 class="classic-title"><span>Payment Confirmation / Konfirmasi Pembayaran</span></h4>

                <form role="form" method="post" id="contact-form" data-toggle="validator" class="shake">
                    <div class="form-group">
                        <div class="controls">
                            <input type="text" id="name" placeholder="Name" name="name" required data-error="Please enter your name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <input type="email" class="email" id="email" name="email" placeholder="Email" required data-error="Please enter your email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="controls">
                                    <input type="text" name="bank_name" id="bank_name" placeholder="Bank name/ Asal Bank" required data-error="Please enter your message subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="controls">
                                    <input type="text" name="bank_account" id="bank_account" placeholder="Bank account number / Nomor Rekening Bank" required data-error="Please enter your message subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="controls">
                                    <input type="text" name="donation" id="donation" placeholder="Amount of donation transfers / Jumlah Transfer" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="controls">
                                    <input type="file" id="recipt" placeholder="Recipt">
                                </div>
                            </div>
                        </div>


                    </div>
                    <button type="submit" id="submit" class="btn-system btn-large">Send</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>

            </div>
            <div class="col-md-4 sidebar right-sidebar">
                <div class="widget widget-popular-posts">
                <h4 class="classic-title"><span>Selected Program</span></h4>
                <ul>
                    {% for item in widget.program() %}
                    <li>
                        <div class="widget-thumb">
                            {% if item.image is defined %}
                                <img alt="" width="65px" height="65px" src="upload/program/{{ item.image }}" />
                            {% else %}
                                <img alt="" src="{{ url("zfl-theme/images/blog-mini-01.jpg") }}" />
                            {% endif %}
                        </div>
                        <div class="widget-content">
                            <h5><a href="http://{{ config.application.publicUrl }}{{ url("programs/"~item.slug) }}">{{ item.title }}</a></h5>
                            <span>{{ item.start_date }}</span>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    {% endfor %}
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>