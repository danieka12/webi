<div class="container-fluid margin_120_0">
    <div class="main_title_2">
        <span><em></em></span>
        <h2>{{ $title }}</h2>
        <p>{{ $desc }}</p>
    </div>
    <div id="reccomended" class="owl-carousel owl-theme">
        @foreach ($populars as $popular)
           @include('components.miniComponents.course-card', ['title' => $popular['title'], 'desc' => $popular['desc'], 'courseLabel' => $popular['courseLabel'], 'timeToComplete' => $popular['timeToComplete'], 'href' => $popular['href'], 'hasEnroll' => $popular['hasEnroll'], 'titlePreview' => $titlePreview, 'previewImage' => $popular['previewImage']])
       @endforeach
    </div>
    <!-- /carousel -->
    <div class="container">
        <p class="btn_home_align"><a href="/materi/semua" class="btn_1 rounded">{{ isset($viewAllCourse) ? $viewAllCourse : "Lihat Semua Materi" }}</a></p>
    </div>
    <!-- /container -->
    <hr>
</div>