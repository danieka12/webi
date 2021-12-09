@extends('components.auth', ['idName' => "register_bg"])
@section('section')
<aside>
		{{-- include guru component --}}
		@include('auth.guru.logo') 
	<form autocomplete="off" action={{ route('auth.register.post') }} method="POST">
		@csrf
		@include('components.miniComponents.message')
		<div class="form-group">

			<span class="input">
			<input class="input_field" value="{{ old('nis') }}" type="text" name="nis">
				<label class="input_label">
				<span class="input__label-content">Masukkan NIS</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field" value="{{ old('name') }}" type="text" name="name" >
				<label class="input_label">
				<span class="input__label-content">Masukkan Nama Lengkap</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field"  type="password" name="password">
				<label class="input_label">
				<span class="input__label-content">Masukkan Password</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field" type="password" id="password2" name="password_confirmation">
				<label class="input_label">
				<span class="input__label-content">Konfirmasi password</span>
			</label>
			</span>
			
			<div id="pass-info" class="clearfix"></div>
		</div>
		<button type="submit" class="btn_1 rounded full-width add_top_30">Daftar WEBI (Siswa) Sekarang</button>
		<div class="text-center add_top_10">Sudah punya akun WEBI? <strong><a href={{ route('auth.login') }}>Masuk Sekarang</a></strong></div>
	</form>
	@include('components.copyright')
</aside>
@endsection