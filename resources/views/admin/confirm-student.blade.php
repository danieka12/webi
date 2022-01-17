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
                        @foreach ($confirmStudents as $confirmStudent)
                            @include('admin.components.miniComponents.card-confirm', $confirmStudent)
                        @endforeach
                    </ul>
                </div>
            </div>
            {{-- <!-- /box_general-->
		<nav aria-label="...">
			<ul class="pagination pagination-sm add_bottom_30">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">Previous</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#">Next</a>
				</li>
			</ul>
		</nav> --}}
            <!-- /pagination-->
        </div>
        <!-- /container-fluid-->
    </div>
@endsection
