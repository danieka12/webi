<li>
    <span>{{ $dateTime }}</span>
    <figure><img src={{ asset($cover) }} alt=""></figure>
    <h4>{{ $title }}</h4>
    <p>{{ $description }}</p>
    <p class="inline-popups">
        <a href="#modal-reply" data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-eye"></i> Lihat Materi Ini</a>
        <a href="#modal-reply" data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-pencil"></i> Edit Materi Ini</a>
        <a href="#modal-reply" data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-trash"></i> Hapus Materi Ini</a>
    </p>
</li>