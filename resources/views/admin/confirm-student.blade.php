@extends('admin.components.app')

@section('body')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     @include('admin.components.miniComponents.breadcrumbs', ['currentPage' => 'Konfirmasi Siswa'])
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">Konfirmasi Siswa Untuk Bergabung Kedalam Materi</h2>
			</div>
			<div class="list_general">
				<ul>
				@for ($i = 0; $i < 5; $i++)
					@include('admin.components.miniComponents.card-confirm',[
						'title' => 'Course title',
						'cover' => 'images/admin/course_1.jpg',
						'nis' => '1702017',
						'joinDate' => '11 November 2017',
						'category' => 'Science, Economy',
						'course' => [
							'title' => 'Course Title',
							'description' => 'Lorem ipsum dolor sit amet, est ei idque voluptua copiosae, pro detracto disputando reformidans at, ex vel suas eripuit. Vel alii zril maiorum ex, mea id sale eirmod epicurei. Sit te possit senserit, eam alia veritus maluisset ei, id cibo vocent ocurreret per. Te qui doming doctus referrentur, usu debet tamquam et. Sea ut nullam aperiam, mei cu tollit salutatus delicatissimi. His appareat perfecto intellegat te.'
						]
					])
				@endfor
				</ul>
			</div>
		</div>
		<!-- /box_general-->
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
		</nav>
		<!-- /pagination-->
	  </div>
	  <!-- /container-fluid-->
   	</div>
@endsection