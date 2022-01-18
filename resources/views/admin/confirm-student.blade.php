@extends('admin.components.app')

@section('body')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            @include('admin.components.miniComponents.breadcrumbs', ['currentPage' => 'Konfirmasi Siswa'])
            @include('admin.error-form')
            <div class="box_general">
                <div class="header_box">
                    <h2 class="d-inline-block">Konfirmasi Siswa Untuk Bergabung Kedalam Materi</h2>
                </div>
                <div class="list_general">
                    <ul>
                        @forElse ($confirmStudents as $confirmStudent)
                            @include('admin.components.miniComponents.card-confirm', $confirmStudent)
                        @empty
                            @include('admin.components.miniComponents.empty-data')
                        @endforElse
                    </ul>
                </div>
            </div>
        </div>
        <!-- /container-fluid-->
    </div>
@endsection
