@extends('components.auth', ['idName' => "login_bg"])
@section('section')
<aside>
		{{-- include guru component --}}
		@include('auth.guru.logo') 
	  <form method="POST" action={{ route("guru.login.perform") }}>
		  @csrf
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
		<button type="submit"  class="btn_1 rounded full-width add_top_30">Masuk ke WEBI (Guru</button>
		@include('components.miniComponents.sign-up-by-teacher')
	</form>
	<div class="copy">© 2021 Udema</div>
</aside>
@endsection
