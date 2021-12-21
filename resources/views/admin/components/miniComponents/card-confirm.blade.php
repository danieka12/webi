<li>
    <figure><img src={{ asset($cover) }} alt=""></figure>
    <h4>{{ $title }} @include('admin.components.miniComponents.bullet.pending')</h4>
    <ul class="course_list">
        <li><strong>Nomor Induk Siswa</strong> {{ $nis }}</li>
        <li><strong>Tanggal Gabung</strong> {{ $joinDate }}</li>
        <li><strong>Kategori</strong> {{ $category }}</li>
    </ul>
    <h6>{{ $course['title'] }}</h6>
    <p>{{ $course['description'] }}</p>
    <ul class="buttons">
        <li><a href="#0" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Konfirmasi Gabung</a></li>
        <li><a href="#0" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Batalkan</a></li>
    </ul>
</li>