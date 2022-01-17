@extends('admin.components.app')

@section('body')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            @include('admin.components.miniComponents.breadcrumbs', ['currentPage' => 'Materi'])
            @if (session('msg'))
                <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="box_general">
                @include('admin.components.miniComponents.sorting')
                <div class="list_general reviews">
                    <ul>
                        @foreach ($courses as $course)
                            @include('admin.components.miniComponents.card-course', $course)
                        @endforeach
                    </ul>
                </div>
            </div>
        @endsection
