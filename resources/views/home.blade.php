@extends('components.app', ['title' => 'Home'])

@section('content')
    <main>
        @include('components.homepage.hero')
        <!-- /hero_single -->

        @include('components.homepage.popular', ['title' => 'Kursus Tersedia Untukmu', 'desc' => 'Cum doctus civibus
        efficiantur in imperdiet deterruisset.', 'titlePreview' => 'Buka Materi'])
        <!-- /popular_content -->

        @include('components.homepage.course', ['title' => 'Opsi Materi Yang Bisa Kamu Pilih', 'desc' => 'Cum doctus civibus
        efficiantur in imperdiet deterruisset.'])
        <!-- /course_content -->

        @include('components.homepage.news-and-event', ['title' => 'Berita dan Acara', 'desc' => 'um doctus civibus
        efficiantur in imperdiet deterruisset.'])
        <!-- /news_and_event -->

        @include('components.homepage.about', ['title' => 'Web Interaktif Platform (WEBI)', 'desc' => 'Ius cu tamquam
        persequeris, eu veniam apeirian platonem qui, id aliquip voluptatibus pri. Ei mea primis ornatus disputationi.
        Menandri erroribus cu per, duo solet congue ut.'])
        <!--/about-->
    </main>
    <!-- /main -->
@endsection
