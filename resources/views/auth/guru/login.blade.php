@extends('components.auth', ['idName' => "login_bg"])
@section('section')
<aside>
		{{-- include guru component --}}
		@include('auth.guru.logo') 
	  <form>
		<div class="form-group">
			<span class="input">
			<input class="input_field" type="email" autocomplete="off" name="email">
				<label class="input_label">
				<span class="input__label-content">Email</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field" type="password" autocomplete="new-password" name="password">
				<label class="input_label">
				<span class="input__label-content">Password</span>
			</label>
			</span>
		</div>
		<a href="#0" class="btn_1 rounded full-width add_top_60">Masuk ke WEBI (Guru)</a>
	</form>
	<div class="copy">© 2021 Udema</div>
</aside>
@endsection
