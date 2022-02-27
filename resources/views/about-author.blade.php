@extends('components.app', ['title' => 'Home'])

@section('content')
    <main>
        @include('components.about.author-card', ['title' => 'Tentang Peneliti WEBI', 'desc' => 'Informasi Detail Tentang WEBI.'])
    </main>
    <!-- /main -->
@endsection
