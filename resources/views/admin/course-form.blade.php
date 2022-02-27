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
                    <label>Foto Materi (Cover)
                        @include('admin.components.miniComponents.required-fill')
                    </label>
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
            <input name="image" type="hidden" value="{{ isset($data) ? $data['image']['name'] : '' }}"
                class="image-upload-value">
            <input type="hidden" name="guruId" value="{{ Auth::guard('guru')->user()->id }}" />
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    @if (isset($data))
                        <h2><i class="fa fa-file"></i>Ubah Materi Yang Akan Diajarkan</h2>
                        <input type="text" value="{{ $data['id'] }}" hidden name="materiId">
                    @else
                        <h2><i class="fa fa-file"></i>Tambah Materi Yang Akan Diajarkan</h2>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Judul Materi @include('admin.components.miniComponents.required-fill')</label>
                            <input type="text" name="title" class="form-control" placeholder="Judul Materi"
                                value="{{ isset($data) ? $data['title'] : old('title') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Durasi Materi (Jam)
                                        @include('admin.components.miniComponents.required-fill')</label>
                                    <input type="number" min="0" max="100" name="durationHour" class="form-control"
                                        value="{{ isset($data) ? $data['durationHour'] : old('durationHour') }}"
                                        placeholder="1 Jam">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Durasi Materi (Menit)
                                        @include('admin.components.miniComponents.required-fill')</label>
                                    <input type="number" min="0" max="60" name="durationMinute" class="form-control"
                                        value="{{ isset($data) ? $data['durationMinute'] : old('durationMinute') }}"
                                        placeholder="30 Menit">
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
                            <label>Tujuan Pembelajaran @include('admin.components.miniComponents.required-fill')</label>
                            @include('admin.components.miniComponents.ckeditor', ['name' => 'description', 'defaultValue' =>
                            isset($data) ? $data['description'] : old('description')])
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{-- <label>Category <a href="#0" data-toggle="tooltip" data-placement="top" title="Separated by commas"><i class="fa fa-fw fa-question-circle"></i></a></label> --}}
                            <label>Mata Pelajaran @include('admin.components.miniComponents.required-fill')</label>
                            @include('admin.components.miniComponents.select2', ['name' => 'categoryId', 'placeholder' =>
                            'Pilih Kategori Materi', 'defaultValue' => isset($data) ? $data['category'] : old('category'),
                            'route' => route('guru.categories')])
                        </div>
                    </div>
                </div>
                <!-- /row-->
            </div>
            <!-- /box_general-->

            @include('admin.components.miniComponents.wyswyg', ['title' => 'Tulis Materi', 'name' => 'content',
            'description' => 'Tulis Materi Disini',
            'required' => true,
            'defaultValue' => isset($data) ? $data['content'] : old('content')])
            <p><button type="submit" class="btn_1 medium">Simpan Materi</button></p>
        </div>
        </form>

        <!-- /.container-fluid-->
    </div>
@endsection

@include('admin.components.scriptUploadImage')
@push('scripts')
    <script>
        $(document).ready(function() {
            $('input[type="number"]').on('keyup', function() {
                v = parseInt($(this).val());
                min = parseInt($(this).attr('min'));
                max = parseInt($(this).attr('max'));
                if (v > max) {
                    $(this).val(max);
                }
            })
        })
    </script>
@endpush
