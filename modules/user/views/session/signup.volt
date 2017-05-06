<div class="section service">
	<div class="container">
		<div class="big-title text-center" data-animation="fadeInDown" data-animation-delay="01">
			<h1>Sign <strong>Up</strong></h1>
		</div>	
		<div class="text-center" data-animation="fadeInDown" data-animation-delay="02">
			{{ content() }}
		</div>
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