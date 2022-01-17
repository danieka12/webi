@extends('components.app', ['title' => $toRead['title']])

@section('content')
    <main>
        @include('components.miniComponents.hero')
        <!--/hero_in-->

        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-12">
                    @include('components.readCourse.post', [
                    'title' => $toRead['title'],
                    'label' => $toRead['label'],
                    'createdAt' => $toRead['createdAt'],
                    'teacher' => $toRead['teacher'],
                    'comments' => count($toRead['comments']),
                    'content' => $toRead['content'],
                    "coverImage" => $toRead['coverImage'],
                    ])
                    <!-- /single-post -->


                    <hr>
                    @include('components.readCourse.comments', ['comments' => $toRead['comments']])
                    <h5>Berikan Komentar Terbaikmu</h5>
                    @include('components.readCourse.comment-form')
                </div>
                <!-- /col -->
                <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!--/main-->
@endsection

@push('styles')
    <!-- SPECIFIC CSS -->
    <link href={{ asset('css/blog.css') }} rel="stylesheet">
@endpush
