@extends('admin.components.app')

@section('body')

    <div class="content-wrapper">
        <!-- Breadcrumbs-->
        @include('admin.components.miniComponents.breadcrumbs', ['currentPage' => $title])
        @include('admin.error-form')
        <div class="col-md-12">
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-file"></i>Upload Cover Gambar Materi</h2>
                </div>
                <div class="form-group">
                    <label>Your photo</label>
                    @if (isset($data))
                        <form action={{ route('guru.course.uploadImage') }} class="dropzone">
                        @else
                            <form action={{ route('guru.course.uploadImage') }} class="dropzone">
                    @endif
                    @csrf
                    </form>
                </div>
                <!-- /row-->
            </div>
        </div>
        @if (isset($data))
            <form action={{ route('guru.course.update') }} method="POST">
                @method("PUT")
            @else
                <form action={{ route('guru.course.create') }} method="POST">
        @endif
        @csrf
        <div class="container-fluid">
            <input name="image" type="hidden" value={{ isset($data) ? $data['image']['coverUrl'] : '' }}
                class="image-upload-value">
            <input type="hidden" name="guruId" value={{ Auth::guard('guru')->user()->id }} />
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    @if (isset($data))
                        <h2><i class="fa fa-file"></i>Ubah Materi Yang Akan Diajarkan</h2>
                        <input type="text" value={{ $data['id'] }} hidden name="materiId">
                    @else
                        <h2><i class="fa fa-file"></i>Tambah Materi Yang Akan Diajarkan</h2>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Judul Materi</label>
                            <input type="text" name="title" class="form-control" placeholder="Judul Materi"
                                value={{ isset($data) ? $data['title'] : '' }}>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Durasi Materi (Jam)</label>
                                    <input type="text" name="durationHour" class="form-control"
                                        value="{{ isset($data) ? $data['durationHour'] : '' }}" placeholder="1 Jam">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Durasi Materi (Menit)</label>
                                    <input type="text" name="durationMinute" class="form-control"
                                        value="{{ isset($data) ? $data['durationMinute'] : '' }}" placeholder="30 Menit">
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
                            @include('admin.components.miniComponents.ckeditor', ['name' => 'description', 'defaultValue' =>
                            isset($data) ? $data['description'] : ""])
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{-- <label>Category <a href="#0" data-toggle="tooltip" data-placement="top" title="Separated by commas"><i class="fa fa-fw fa-question-circle"></i></a></label> --}}
                            <label>Kategori Materi</label>
                            @include('admin.components.miniComponents.select2', ['name' => 'categoryId', 'placeholder' =>
                            'Pilih Kategori Materi', 'defaultValue' => isset($data) ? $data['category'] : null,
                            'route' => route('guru.categories')])
                        </div>
                    </div>
                </div>
                <!-- /row-->
            </div>
            <!-- /box_general-->

            @include('admin.components.miniComponents.wyswyg', ['title' => 'Tulis Materi', 'name' => 'content',
            'description' => 'Tulis Materi Disini',
            'defaultValue' => isset($data) ? $data['content'] : ""])
            <p><button type="submit" class="btn_1 medium">Simpan Materi</button></p>
        </div>
        </form>

        <!-- /.container-fluid-->
    </div>
@endsection

@push('styles')
    <link href={{ asset('js/admin/vendor/dropzone.css') }} rel="stylesheet">
@endpush

@push('scripts')
    <!-- Custom scripts for this page-->
    <script src={{ asset('js/admin/vendor/dropzone.min.js') }}></script>
    <script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone", {
            maxFilesize: 2, // 2 mb
            acceptedFiles: ".jpeg,.jpg,.png,.pdf",
            init: function() {
                if ("{{ isset($data) }}") {
                    var thisDropzone = this;
                    var mockFile = {
                        name: "{{ isset($data) ? $data['image']['name'] : '' }}",
                        size: "{{ isset($data) ? $data['image']['size'] : '' }}",
                        type: "{{ isset($data) ? $data['image']['type'] : '' }}"
                    };
                    thisDropzone.emit("addedfile", mockFile);
                    thisDropzone.emit("success", mockFile);
                    thisDropzone.emit("thumbnail", mockFile,
                        "{{ isset($data) ? asset($data['image']['coverUrl']) : '' }}")

                    this.on("maxfilesexceeded", function(file) {
                        this.removeFile(file);
                        alert("No more files please!");
                    });
                }


            },
        });
        myDropzone.on("success", function(file, response) {
            if (response.success) { // Result
                $(".image-upload-value").val(response.success)
            }
        });
    </script>
@endpush
