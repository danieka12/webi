@extends('components.app', ['title' => 'Home'])

@section('content')
    <main>
    @include('components.homepage.hero')
    <!-- /hero_single -->

      @include('components.homepage.popular', ['title' => 'Udema Popular Courses', 'desc' => 'Cum doctus civibus efficiantur in imperdiet deterruisset.', 'titlePreview' => 'Buka Materi'])
        <!-- /popular_content -->

        @include('components.homepage.course', ['title' => 'Udema Categories Courses', 'desc' => 'Cum doctus civibus efficiantur in imperdiet deterruisset.'])
        <!-- /course_content -->
 
     @include('components.homepage.news-and-event', ['title' => 'News and Events', 'desc' => 'um doctus civibus efficiantur in imperdiet deterruisset.'])
        <!-- /news_and_event -->

       @include('components.homepage.about', ['title' => 'Enjoy a great students community', 'desc' => 'Ius cu tamquam persequeris, eu veniam apeirian platonem qui, id aliquip voluptatibus pri. Ei mea primis ornatus disputationi. Menandri erroribus cu per, duo solet congue ut.'])
        <!--/about-->
    </main>
    <!-- /main -->
@endsection
