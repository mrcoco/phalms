<section id="work-process">
<div class="container">
	<div class="section-header">
		<h2 class="section-title text-center wow fadeInDown">Forgot <strong>Password?</strong></h2>
		<p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
	</div>
	<div class="row text-center" data-animation="fadeInDown" data-animation-delay="02">
        {{ content() }}
	</div>

	<div class="row text-center">
		<div class="col-md-offset-3 col-md-6 text-center">
            {{ form('class': 'form-inline','id':'contactForm','role':'form') }}
			<div class="form-group">
				<div class="controls">
                    {{ form.render('email') }}
				</div>
			</div>
			<button type="submit" class="btn-system btn-large">Send</button>
			</form>
		</div>
	</div>
</div>
</section><!--/#work-process-->
<section id="get-in-touch">
	<div class="container">
		<div class="section-header">
			<h2 class="section-title text-center wow fadeInDown">Get in Touch</h2>
			<p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
		</div>
	</div>
</section><!--/#get-in-touch-->