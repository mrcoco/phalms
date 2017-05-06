<div class="section service">
	<div class="container">
		<div class="big-title text-center" data-animation="fadeInDown" data-animation-delay="01">
			<h1>Sign <strong>in</strong></h1>
		</div>	
		<div class="text-center" data-animation="fadeInDown" data-animation-delay="02">
			{{ content() }}
		</div>
		<div class="col-md-offset-3 col-md-6 text-center">
			{{ form('class': 'form-horizontal','id':'contactForm','role':'form') }}
				<div class="form-group">
					<div class="controls">
						{{ form.render('email') }}
						<div class="help-block with-errors"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="controls">
						{{ form.render('password') }}
						<div class="help-block with-errors"></div>
					</div>
				</div>
				<div class="checkbox">
					<label>
					{{ form.render('remember') }}
					Remember me
					</label>
				</div>
				<button type="submit" class="btn-system btn-large">login</button>
			</form>
			<div>
				<br />
				{{ link_to("session/forgotPassword", "Forgot my password") }}
			</div>
		</div>
	</div>
</div>