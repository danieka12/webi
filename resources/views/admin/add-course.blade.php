@extends('admin.components.app')

@section('body')
<div class="content-wrapper">
  <form action={{ route('guru.course.create') }} method="POST" enctype="multipart/form-data">
	@csrf
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		@include('admin.components.miniComponents.breadcrumbs', ['currentPage' => 'Tambah Materi'])
		<input type="hidden" name="penulisId" value="1" />
		  <div class="box_general padding_bottom">
			  <div class="header_box version_2">
				  <h2><i class="fa fa-file"></i>Tambah Materi Yang Akan Diajarkan</h2>
			  </div>
			  <div class="row">
				  <div class="col-md-6">
					  <div class="form-group">
						  <label>Judul Materi</label>
						  <input type="text" name="title" class="form-control" placeholder="Judul Materi">
					  </div>
				  </div>
				  <div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Durasi Materi (Jam)</label>
							<input type="text" name="durationHour" class="form-control" placeholder="1 Jam">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Durasi Materi (Menit)</label>
							<input type="text" name="durationMinute" class="form-control" placeholder="30 Menit">
						</div>
					</div>
				</div>
				  </div>
			  </div>
			  <!-- /row-->
		  </div>
		  <!-- /box_general-->
		  
		  <div class="box_general padding_bottom">
			  <div class="header_box version_2">
				  <h2><i class="fa fa-file-text"></i>Deskripsi Materi</h2>
			  </div>
			  <div class="row">
				  <div class="col-md-12">
					  <div class="form-group">
						  <label>Tujuan Pembelajaran</label>
						  @include('admin.components.miniComponents.ckeditor', ['name' => 'description'])
					  </div>
				  </div>
			  </div>
			  <!-- /row-->
			  <div class="row">
				  <div class="col-md-12">
					  <div class="form-group">
						  {{-- <label>Category <a href="#0" data-toggle="tooltip" data-placement="top" title="Separated by commas"><i class="fa fa-fw fa-question-circle"></i></a></label> --}}
						  <label>Kategori Materi</label>
						  @include('admin.components.miniComponents.select2', ['name' => 'categoryId', 'placeholder' => 'Pilih Kategori Materi', 'route' => route('guru.categories')])
					  </div>
				  </div>
			  </div>
			  <!-- /row-->
		  </div>
		  <!-- /box_general-->
  
		  @include('admin.components.miniComponents.wyswyg', ['title' => 'Tulis Materi', 'name' => 'content', 'description' => 'Tulis Materi Disini'])
		  <p><button type="submit" class="btn_1 medium">Simpan Materi</button></p>
		</div>
  </form>
	  <!-- /.container-fluid-->
   	</div>
@endsection