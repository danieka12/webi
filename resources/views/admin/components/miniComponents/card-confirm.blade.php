<li>
    <figure><img src={{ asset($cover) }} alt=""></figure>
    <h4 class="text-capitalize">{{ $title }} @include('admin.components.miniComponents.bullet.pending')</h4>
    <ul class="course_list">
        <li><strong>Nomor Induk Siswa</strong> {{ $nis }}</li>
        <li><strong>Tanggal Gabung</strong> {{ $joinDate }}</li>
        <li><strong class="text-capitalize">Kategori</strong> {{ $category }}</li>
    </ul>
    <h6 class="text-capitalize">{{ $course['title'] }}</h6>
    <div style="height: 4rem; overflow: hidden">{!! $course['description'] !!}</div>
    <ul class="buttons">
        <li>
            <form action="" method="POST">
                @csrf
                <input type="text" hidden value={{ $id }} name="courseId">
                <button type="submit" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Konfirmasi
                    Gabung</button>
            </form>
        </li>
        {{-- <li><a href="#0" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Batalkan</a></li> --}}
    </ul>
</li>
