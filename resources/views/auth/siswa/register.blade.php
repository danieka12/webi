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
				<span class="input__label-content">Masukkan NIS</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field" type="text">
				<label class="input_label">
				<span class="input__label-content">Masukkan Nama Lengkap</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field" type="email">
				<label class="input_label">
				<span class="input__label-content">Masukkan Password</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field" type="password" id="password2">
				<label class="input_label">
				<span class="input__label-content">Konfirmasi password</span>
			</label>
			</span>
			
			<div id="pass-info" class="clearfix"></div>
		</div>
		<a href="#0" class="btn_1 rounded full-width add_top_30">Daftar WEBI (Siswa) Sekarang</a>
		<div class="text-center add_top_10">Sudah punya akun WEBI? <strong><a href="login.html">Masuk Sekarang</a></strong></div>
	</form>
	@include('components.copyright')
</aside>
@endsection