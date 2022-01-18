@extends('admin.components.app')

@section('body')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            @include('admin.components.miniComponents.breadcrumbs', ['currentPage' => 'Edit Profil'])
            @include('admin.error-form')
            <div class="col-md-12">
                <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-file"></i>Upload Foto Profil</h2>
                    </div>
                    <div class="form-group">
                        <label>Foto Profil (Guru)</label>
                        <form action={{ route('guru.course.uploadImage') }} class="dropzone">
                            @csrf
                        </form>
                    </div>
                    <!-- /row-->
                </div>
            </div>
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-file"></i>Edit Profil Guru</h2>
                </div>
                <form action="{{ route('guru.teacher.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="image" value="{{ isset($data) ? $data['image']['name'] : '' }}"
                        class="image-upload-value">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ isset($data) ? $data['name'] : '' }}"
                                    placeholder="Masukkan nama lengkap anda">
                            </div>
                        </div>

                    </div>
                    <!-- /row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ isset($data) ? $data['email'] : '' }}" placeholder="Masukkan Email Anda">
                            </div>
                        </div>
                    </div>
                    <!-- /row-->
            </div>
            <!-- /box_general-->

            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-lock"></i>Keamanan</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" placeholder="*****">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="text" class="form-control" name="password_confirmation" placeholder="*****">
                        </div>
                    </div>
                </div>
                <!-- /row-->
            </div>
            <!-- /box_general-->

            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-file-text"></i>Detail Informasi</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Deskripsi Profil Guru</label>
                            @include('admin.components.miniComponents.ckeditor', ['name' => 'description', 'defaultValue' =>
                            isset($data) ? $data['description'] : ""])
                        </div>
                    </div>
                </div>
                <!-- /row-->
            </div>
            <!-- /box_general-->

            <!-- /box_general-->
            <p><button type="submit" class="btn_1 medium">Simpan Data</button></p>
            </form>
        </div>
        <!-- /.container-fluid-->
    </div>
@endsection

@include('admin.components.scriptUploadImage')
