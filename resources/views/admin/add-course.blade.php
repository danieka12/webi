@extends('admin.components.app')

@section('body')

<div class="content-wrapper">
	<!-- Breadcrumbs-->
	@include('admin.components.miniComponents.breadcrumbs', ['currentPage' => 'Tambah Materi'])

	<div class="col-md-12">
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Upload Cover Gambar Materi</h2>
			</div>
			<div class="form-group">
				<label>Your photo</label>
					<form action={{ route('guru.course.uploadImage') }} class="dropzone">
					@csrf
				</form>
				</div>
			<!-- /row-->
		</div>
	</div>
  <form action={{ route('guru.course.create') }} method="POST">
	@csrf
	<div class="container-fluid">
		<input name="image" type="hidden" value="" class="image-upload-value">
		<input type="hidden" name="guruId" value={{ Auth::guard("guru")->user()->id }} />
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

@push('styles')
	<link href={{ asset("js/admin/vendor/dropzone.css") }} rel="stylesheet">
@endpush

@push('scripts')
	<!-- Custom scripts for this page-->
	<script src={{ asset("js/admin/vendor/dropzone.min.js") }}></script>
	<script>
	Dropzone.autoDiscover = false;
       var myDropzone = new Dropzone(".dropzone",{ 
            maxFilesize: 2, // 2 mb
            acceptedFiles: ".jpeg,.jpg,.png,.pdf",
       });
       myDropzone.on("success", function(file, response) {
            if(response.success){ // Result
                  $(".image-upload-value").val(response.success)
            }
       });
	</script>
@endpush