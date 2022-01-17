@if (!Auth::guard('siswa')->check())
    <ul id="top_menu">
        <li class="hidden_tablet"><a href={{ route('auth.login') }} class="btn_1 rounded">Masuk</a></li>
    </ul>
@endif
