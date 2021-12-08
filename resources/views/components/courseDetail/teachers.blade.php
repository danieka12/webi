<section id="teachers">
    <div class="intro_title">
        <h2>Guru</h2>
    </div>
    <p>Zril causae ancillae sit ea. Dicam veritus mediocritatem sea ex, nec id agam eius. Te pri facete latine salutandi, scripta mediocrem et sed, cum ne mundi vulputate. Ne his sint graeco detraxit, posse exerci volutpat has in.</p>
    <div class="row add_top_20 add_bottom_30">
        <div class="col-lg-6">
            <ul class="list_teachers">
                <li>
                    <a href={{ route('teacher.profile', ['id' => $guru['id']]) }}>
                        <figure><img src="http://via.placeholder.com/150x150/ccc/fff/teacher_1_thumb.jpg" alt=""></figure>
                        <h5>{{ $teacherName }}</h5>
                        <p>
                            @foreach ($field as $title)
                            {{ $title }}
                                @if (!$loop->last)
                                    {{ ", " }}
                                @endif
                            @endforeach    
                        </p><i class="pe-7s-angle-right-circle"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /row -->
</section>
<!-- /section -->
