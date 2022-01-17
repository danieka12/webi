@extends('components.auth', ['idName' => "login_bg"])
@section('section')
    <aside>
        {{-- include guru component --}}
        @include('auth.guru.logo')
        <form method="POST" action={{ route('auth.login.post') }}>
            @include('admin.error-form')
            @csrf
            @include('components.miniComponents.message')
            <div class="form-group">
                <span class="input">
                    <input class="input_field" type="text" autocomplete="off" name="nis">
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
            <button type="submit" class="btn_1 rounded full-width add_top_60">Masuk ke WEBI</button>
            @include('components.miniComponents.sign-in-by-teacher')
            <div class="divider"><span>Atau</span></div>
            <div class="text-center add_top_30">Daftar Sebagai Siswa? <strong><a href={{ route('auth.register') }}>Klik
                        disini</a></strong></div>
        </form>
        <div class="copy">© 2022 Webi</div>
    </aside>
@endsection
