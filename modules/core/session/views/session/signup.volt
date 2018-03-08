<section id="work-process">
<div class="container">
	<div class="section-header">
		<h2 class="section-title text-center wow fadeInDown">Sign Up</h2>
		<p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
	</div>
	<div class="row text-center" data-animation="fadeInDown" data-animation-delay="02">
        {{ content() }}
	</div>

	<div class="text-center">
		<div class="col-md-offset-3 col-md-6 text-center">
            {{ form('class': 'form-horizontal','id':'contactForm','role':'form') }}
			<div class="form-group">
				<div class="controls">
                    {{ form.render('name') }}
                    {{ form.messages('name') }}
					<div class="help-block with-errors"></div>
				</div>
			</div>
			<div class="form-group">
				<div class="controls">
                    {{ form.render('email') }}
                    {{ form.messages('email') }}
					<div class="help-block with-errors"></div>
				</div>
			</div>
			<div class="form-group">
				<div class="controls">
                    {{ form.render('password') }}
                    {{ form.messages('password') }}
					<div class="help-block with-errors"></div>
				</div>
			</div>
			<div class="form-group">
				<div class="controls">
                    {{ form.render('confirmPassword') }}
                    {{ form.messages('confirmPassword') }}
					<div class="help-block with-errors"></div>
				</div>
			</div>
			<div class="checkbox">
				<label>
                    {{ form.render('terms') }}
                    {{ form.label('terms') }}
				</label>
                {{ form.messages('terms') }}
			</div>
            {{ form.render('Sign Up') }}
			</form>
		</div>
	</div>
</div>
</section><!--/#work-process-->