<div class="box_detail">
    <h4 class="text-center">Gabung Materi</h4>
    <p class="nopadding">Tekan tombol Gabung Sekarang untuk bisa membaca materi secara lengkap.</p>
    <div id="message-contact"></div>
    <form method="POST" action={{ route('course.join') }} id="contactform" autocomplete="off">
        @csrf
        <div class="row">
            <input type="hidden" name="slug" value={{ $slug }}>
            <input type="hidden" name="userId" value={{ $slug }}>
        <div style="position:relative;" class="mt-4"><input type="submit" value="Gabung Sekarang" class="btn_1 full-width" id="submit-contact"></div>
    </form>
</div>