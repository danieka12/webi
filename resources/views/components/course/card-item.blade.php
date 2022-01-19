<figure class="block-reveal">
    <div class="block-horizzontal"></div>
    <a href={{ $href }}>
        <div class="preview"><span>{{ $titlePreview }}</span></div>
        <img style="width:100%;height:350px" }} src={{ asset($previewImage) }} class="image-fluid image-responsive"
            alt="" />
    </a>
</figure>
<div class="wrapper wrapper-popular">
    <small class="text-capitalize">{{ $courseLabel }}</small>
    <h3 class="text-capitalize">{{ $title }}</h3>
    <div class="wrapper-body">{!! strip_tags($desc) !!}
    </div>

</div>
<ul>
    <li><i class="icon_clock_alt"></i> {{ $timeToComplete }}</li>
    @if ($hasEnroll)
        <li class="text-success"><i class="icon_check"></i> Telah Diambil</li>
    @endif
    <li><a href={{ $href }}>{{ $hasEnroll ? 'Buka' : 'Ambil' }} Materi</a></li>
</ul>
