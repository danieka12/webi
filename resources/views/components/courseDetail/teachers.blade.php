<section id="teachers">
    <div class="intro_title">
        <h2>Guru</h2>
    </div>
    @if (isset($description))
        <p>{!! $description !!}</p>
    @else
        <p>Belum ada deskripsi guru.</p>
    @endif
    <div class="row add_top_20 add_bottom_30">
        <div class="col-lg-6">
            <ul class="list_teachers">
                <li>
                    <a href={{ route('teacher.profile', ['id' => $guru['id']]) }}>
                        <figure>
                            @if (isset($profile))
                                <img src={{ asset($profile) }} alt="{{ $teacherName }}">
                            @else
                                <img src="http://via.placeholder.com/150x150/ccc/fff/teacher_1_thumb.jpg"
                                    alt="{{ $teacherName }}">

                            @endif
                        </figure>
                        <h5 class="text-capitalize">{{ $teacherName }}</h5>
                        <p>
                            @foreach ($field as $title)
                                {{ $title }}
                                @if (!$loop->last)
                                    {{ ', ' }}
                                @endif
                            @endforeach
                        </p><i class="pe-7s-angle-right-circle"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /row -->
</section>
<!-- /section -->
