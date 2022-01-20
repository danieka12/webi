<figure>
    {{-- <a href="#0" class="wish_bt"></a> --}}
    <a href={{ $href }}>
        <div class="preview"><span>{{ $titlePreview }}</span></div>
        <img style="width:100%;height:350px" }} src={{ asset($previewImage) }} class="image-fluid image-responsive"
            alt="" />
    </a>
    {{-- <div class="price">$39</div> --}}

</figure>
<div class="wrapper-popular wrapper">
    <small>{{ $courseLabel }}</small>
    <h3>{{ $title }}</h3>
    <div class="wrapper-body">
        {!! strip_tags($desc) !!}
    </div>
    @include('components.course.has-enroll')
</div>
<ul>
    <li><i class="icon_clock_alt"></i> {{ $timeToComplete }}</li>

    <li><a href={{ $href }}>{{ $hasEnroll ? 'Buka' : 'Ambil' }} Materi</a></li>
</ul>
