@extends('components.app', ['title' => 'Home'])

@section('content')
    <main>
        @include('components.about.author-card', ['title' => 'Tentang Peneliti WEBI', 'desc' => 'Cum doctus civibus efficiantur in imperdiet deterruisset.'])
    </main>
    <!-- /main -->
@endsection
