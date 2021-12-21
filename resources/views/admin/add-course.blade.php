@extends('admin.components.app')

@section('body')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      @include('admin.components.miniComponents.breadcrumbs', ['currentPage' => 'Tambah Materi'])
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Tambah Materi Yang Akan Diajarkan</h2>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Judul Materi</label>
						<input type="text" class="form-control" placeholder="Judul Materi">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Durasi Materi</label>
						<input type="text" class="form-control" placeholder="Course category">
					</div>
				</div>
			</div>
			<!-- /row-->
		</div>
		<!-- /box_general-->
		
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file-text"></i>Description</h2>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Course description</label>
						<textarea rows="5" class="form-control" style="height:100px;" placeholder="Description"></textarea>
					</div>
				</div>
			</div>
			<!-- /row-->
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Category <a href="#0" data-toggle="tooltip" data-placement="top" title="Separated by commas"><i class="fa fa-fw fa-question-circle"></i></a></label>
						<input type="text" class="form-control" placeholder="Ex: Science, Biology...">
					</div>
				</div>
			</div>
			<!-- /row-->
		</div>
		<!-- /box_general-->
		<p><a href="#0" class="btn_1 medium">Simpan Materi</a></p>
	  </div>
	  <!-- /.container-fluid-->
   	</div>
@endsection