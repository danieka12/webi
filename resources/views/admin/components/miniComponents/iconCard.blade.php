<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card dashboard text-white bg-primary o-hidden h-100">
        <div class="card-body">
            <div class="card-body-icon">
                <i class="fa fa-fw fa-envelope-open"></i>
            </div>
            <div class="mr-5">
                <h5>{{ $totalMateri }} Materi</h5>
            </div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href={{ route('guru.course') }}>
            <span class="float-left">Lihat Selengkapnya</span>
            <span class="float-right">
                <i class="fa fa-angle-right"></i>
            </span>
        </a>
    </div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card dashboard text-white bg-warning o-hidden h-100">
        <div class="card-body">
            <div class="card-body-icon">
                <i class="fa fa-fw fa-star"></i>
            </div>
            <div class="mr-5">
                <h5>{{ $notConfirm }} Belum Terkonfirmasi</h5>
            </div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{ route('guru.confirmStudent') }}">
            <span class="float-left">Lihat Selengkapnya</span>
            <span class="float-right">
                <i class="fa fa-angle-right"></i>
            </span>
        </a>
    </div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card dashboard text-white bg-success o-hidden h-100">
        <div class="card-body">
            <div class="card-body-icon">
                <i class="fa fa-fw fa-calendar-check-o"></i>
            </div>
            <div class="mr-5">
                <h5>{{ $confirm }} Terkonfirmasi</h5>
            </div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{ route('guru.confirmStudent') }}">
            <span class="float-left">Lihat Selengkapnya</span>
            <span class="float-right">
                <i class="fa fa-angle-right"></i>
            </span>
        </a>
    </div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card dashboard text-white bg-danger o-hidden h-100">
        <div class="card-body">
            <div class="card-body-icon">
                <i class="fa fa-fw fa-heart"></i>
            </div>
            <div class="mr-5">
                <h5>{{ $totalMateriTaken }} Siswa Terdaftar!</h5>
            </div>
        </div>
    </div>
</div>
</div>
