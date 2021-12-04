@extends('components.auth', ['idName' => "register_bg"])
@section('section')
<aside>
		{{-- include guru component --}}
		@include('auth.guru.logo') 
	<form autocomplete="off">
		<div class="form-group">

			<span class="input">
			<input class="input_field" type="text">
				<label class="input_label">
				<span class="input__label-content">Your Name</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field" type="text">
				<label class="input_label">
				<span class="input__label-content">Your Last Name</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field" type="email">
				<label class="input_label">
				<span class="input__label-content">Your Email</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field" type="password" id="password1">
				<label class="input_label">
				<span class="input__label-content">Your password</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field" type="password" id="password2">
				<label class="input_label">
				<span class="input__label-content">Confirm password</span>
			</label>
			</span>
			
			<div id="pass-info" class="clearfix"></div>
		</div>
		<a href="#0" class="btn_1 rounded full-width add_top_30">Register to Udema</a>
		<div class="text-center add_top_10">Already have an acccount? <strong><a href="login.html">Sign In</a></strong></div>
	</form>
	<div class="copy">© 2021 Udema</div>
</aside>
@endsection