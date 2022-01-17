@extends('components.app', ['withClass' => true, 'title' => 'Detail Guru'])


@section('content')
    <main>
        @include('components.miniComponents.hero', ['title' => 'detail guru'])
        <!--/hero_in-->
        <div class="container margin_60_35">
            <div class="row">
                @include('components.teachers.profile', $profil)
                <!--/aside -->

                @include('components.teachers.content', $meta)
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!--/main-->
@endsection
