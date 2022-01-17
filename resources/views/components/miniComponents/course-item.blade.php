<figure>
    {{-- <a href="#0" class="wish_bt"></a> --}}
    <a href={{ $href }}>
        <div class="preview"><span>{{ $titlePreview }}</span></div>
        <img src={{ $previewImage }} class="image-fluid" alt="" />
    </a>
    {{-- <div class="price">$39</div> --}}

</figure>
<div class="wrapper-popular wrapper">
    <small>{{ $courseLabel }}</small>
    <h3>{{ $title }}</h3>
    <div class="wrapper-body">
        {!! $desc !!}
    </div>

</div>
<ul>
    <li><i class="icon_clock_alt"></i> {{ $timeToComplete }}</li>
    @if ($hasEnroll)
        <li class="text-success"><i class="icon_check"></i> Telah Diambil</li>
    @endif
    <li><a href={{ $href }}>{{ $hasEnroll ? 'Buka' : 'Ambil' }} Materi</a></li>
</ul>
