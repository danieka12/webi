@extends('components.app', ['title' => $toRead['title']])

@section('content')
    <main>
        @include('components.miniComponents.hero', ['title' => $toRead['title']])
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

                    @if (!$toRead['hasFillSurvey'])
                        @include('components.readCourse.survey', ['courseId' => $toRead['id'], 'slug' => $toRead['slug'] ,
                        'guruId' =>
                        $toRead['teacherId']])
                    @else
                        <div class="alert alert-success" role="alert">
                            Terima kasih telah mengisi formulir angket. Hasil angketmu sudah
                            disimpan didalam data WEBI.
                        </div>
                    @endif
                    <hr>
                    @include('components.readCourse.comments', ['comments' => $toRead['comments'], 'countComment' =>
                    count($toRead['comments'])])
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
