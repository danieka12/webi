<aside class="col-lg-3" id="sidebar">
    <div class="profile">
        <figure><img src={{ asset($teacherProfile) }} alt="Teacher" class="rounded-circle"
                style="width:150px;height:150px;object-fit: cover"></figure>
        <ul>
            <li>Nama <b class="float-right text-capitalize">{{ $teacherName }}</b> </li>
            <li>Siswa Bergabung <b class="float-right">{{ $siswaJoin }} Siswa</b></li>
            <li>Materi <b class="float-right">{{ $courses }} Total Materi</b></li>
        </ul>
    </div>
</aside>
