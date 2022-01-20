<section class="hero_single version_2">
    <div class="wrapper">
        <div class="container">
            <h3>Kamu ingin cari materi apa?</h3>
            <p>Tambah pengetahuanmu dengan membaca materi dari guru pilihannmu</p>
            <form method="GET" action="{{ route('course.search-by') }}">
                <div id="custom-search-input">
                    <div class="input-group">
                        <input type="text" name="q" class=" search-query" placeholder="Cari Disini...">
                        <input type="submit" class="btn_search" value="Cari Sekarang">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
