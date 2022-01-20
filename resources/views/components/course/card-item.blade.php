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
@include('components.course.has-enroll')
<ul>
    <li><i class="icon_clock_alt"></i> {{ $timeToComplete }}</li>

    <li><a href={{ $href }}>{{ $hasEnroll ? 'Buka' : 'Ambil' }} Materi</a></li>
</ul>
