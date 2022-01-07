@extends('components.auth', ['idName' => "register_bg"])
@section('section')
<aside>
		{{-- include guru component --}}
		@include('auth.guru.logo') 
	<form autocomplete="off" action={{ route('guru.register.perform') }} method="post" >
		@csrf
		<div class="form-group">
			<span class="input">
			<input class="input_field"  value="{{ old('name') }}" name="name" type="text">
				<label class="input_label">
				<span class="input__label-content">Masukkan Nama Lengkap</span>
			</label>
			</span>

			<span class="input">
			<input class="input_field"  value="{{ old('email') }}" name="email" type="email">
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
			<input class="input_field" name="password_confirmation" type="password" id="password2">
				<label class="input_label">
				<span class="input__label-content">Konfirmasi password</span>
			</label>
			</span>
			
			<div id="pass-info" class="clearfix"></div>
		</div>
		<button type="submit"  class="btn_1 rounded full-width add_top_30">Daftar WEBI (Guru) Sekarang</button>
		@include('components.miniComponents.sign-in-by-teacher')
		@include('components.copyright')
	</form>
</aside>
@endsection