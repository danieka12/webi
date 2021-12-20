@extends('components.auth', ['idName' => "register_bg"])
@section('section')
<aside>
		{{-- include guru component --}}
		@include('auth.guru.logo') 
	<form autocomplete="off" method="POST" action={{ route('auth.register.post') }}>
		@csrf
		<div class="form-group">
			<span class="input">
			<input class="input_field" name="name" type="text">
				<label class="input_label">
				<span class="input__label-content">Masukkan Nama Lengkap</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field" name="email" type="email">
				<label class="input_label">
				<span class="input__label-content">Masukkan Email</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field" name="password" type="password" id="password1">
				<label class="input_label">
				<span class="input__label-content">Masukkan Password</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field" name="password" type="password" id="password2">
				<label class="input_label">
				<span class="input__label-content">Konfirmasi password</span>
			</label>
			</span>
			
			<div id="pass-info" class="clearfix"></div>
		</div>
		<a href="#0" class="btn_1 rounded full-width add_top_30">Daftar WEBI (Guru) Sekarang</a>
		<div class="text-center add_top_10">Masuk sebagai guru? <strong><a href="register.html">Klik disini</a></strong></div>
		@include('components.copyright')
	</form>
</aside>
@endsection