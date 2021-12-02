@extends('components.app')

@section('content')
<div id="login_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	
	<div id="login">
		<aside>
			<figure>
				<a href="index.html"><img src="img/logo.png" width="149" height="42" alt=""></a>
			</figure>
			  <form>
				<div class="form-group">
					<span class="input">
					<input class="input_field" type="email" autocomplete="off" name="email">
						<label class="input_label">
						<span class="input__label-content">Your email</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="password" autocomplete="new-password" name="password">
						<label class="input_label">
						<span class="input__label-content">Your password</span>
					</label>
					</span>
					<small><a href="#0">Forgot password?</a></small>
				</div>
				<a href="#0" class="btn_1 rounded full-width add_top_60">Login to Udema</a>
			</form>
			<div class="copy">© 2021 Udema</div>
		</aside>
	</div>
</div>
@endsection
