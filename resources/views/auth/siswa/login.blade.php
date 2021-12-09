@extends('components.auth', ['idName' => "login_bg"])
@section('section')
<aside>
		{{-- include guru component --}}
		@include('auth.guru.logo') 
	  <form>
		@include('components.miniComponents.message')
		<div class="form-group">
			<span class="input">
			<input class="input_field" type="email" autocomplete="off" name="nis">
				<label class="input_label">
				<span class="input__label-content">NIS (Nomor Induk Siswa)</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field" type="password" autocomplete="new-password" name="password">
				<label class="input_label">
				<span class="input__label-content">Password</span>
			</label>
			</span>
		</div>
		<a href="#0" class="btn_1 rounded full-width add_top_60">Masuk ke WEBI</a>
		<div class="text-center add_top_10">Masuk sebagai guru? <strong><a href="register.html">Klik disini</a></strong></div>
		<div class="divider"><span>Atau</span></div>
		<div class="text-center add_top_30">Daftar Sebagai Siswa? <strong><a href={{ route('auth.register') }}>Klik disini</a></strong></div>
	</form>
	<div class="copy">© 2021 Udema</div>
</aside>
@endsection
