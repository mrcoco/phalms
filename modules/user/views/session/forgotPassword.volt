<div class="section service">
	<div class="container">
		<div class="big-title text-center" data-animation="fadeInDown" data-animation-delay="01">
			<h1>Forgot <strong>Password?</strong></h1>
		</div>	
		<div class="text-center" data-animation="fadeInDown" data-animation-delay="02">
			{{ content() }}
		</div>
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