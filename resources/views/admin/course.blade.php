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
                        @forElse ($courses as $course)
                            @include('admin.components.miniComponents.card-course', $course)
                        @empty
                            @include('admin.components.miniComponents.empty-data')
                        @endforElse
                    </ul>
                </div>
            </div>
        @endsection
