@if ($hasTaken && !$hasConfirm)
    <div class="alert alert-success" role="alert">
        <span class="text-sm">
            Anda sudah mengambil materi ini. Silahkan tunggu konfirmasi dari guru pengampu mata pelajaran.
        </span>
    </div>
@endif
<div id="message-contact"></div>


<div class="box_detail">
    <h4 class="text-center">{{ $titleBtn }}</h4>
    @if (!$hasTaken || !$hasConfirm)
        <p class="nopadding">Tekan tombol Gabung Sekarang untuk bisa membaca materi secara lengkap.</p>
    @else
        <p class="nopadding">Silahkan membaca materi secara lengkap. Dengan menekan tombol
            <b>{{ $titleBtn }}</b>
        </p>

    @endif
    <form id="contactform" method="POST" action={{ route('course.join.post') }} autocomplete="off">
        <div class="row">
            <input type="hidden" id="slug" name="slug" value={{ $slug }}>
            @if (Auth::guard('siswa')->user())
                <input type="hidden" id="user_id" name="user_id" value={{ Auth::guard('siswa')->user()->id }}>
            @endif
            <div style="position:relative;" class="mt-4">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        This is a danger alert—check it out!
                    </div>
                @endif
                @if (Auth::guard('siswa')->check() && $hasConfirm)
                    <a href="{{ $slug }}" class="btn_1 full-width" id="submit-course">
                        {{ $titleBtn }}
                    </a>
                @endif
                @if (Auth::guard('siswa')->check() && !$hasTaken && !$hasConfirm)
                    <button type="submit" class="btn_1 full-width" id="submit-course">
                        {{ $titleBtn }}
                    </button>
                @endif
                @if (!Auth::guard('siswa')->check() || ($hasTaken && !$hasConfirm))
                    <button type="submit" disabled class="btn_1 full-width" id="submit-course">
                        {{ $titleBtn }}
                    </button>
                @endif
            </div>
    </form>
</div>
