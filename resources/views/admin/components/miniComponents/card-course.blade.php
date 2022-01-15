<li>
    <span>{{ $dateTime }}</span>
    <figure><img src={{ asset($cover) }} alt=""></figure>
    <h4 class="text-capitalize">{{ $title }}</h4>
   <div style="height: 7rem; overflow: hidden">
    <div>{!! $description !!}</div>
   </div>
    <div class="d-flex align-items-center justify-content-between">
        <div class="inline-popups d-flex mb-3">
            <a href={{ route('course.detail', ['slug' => $title .".". $id]) }} data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-eye"></i> Lihat Materi Ini</a>
            <a href="#modal-reply" data-effect="mfp-zoom-in" class="btn_1 gray ml-2 mr-2"><i class="fa fa-fw fa-pencil"></i> Edit Materi Ini</a>
            <form action={{ route("guru.course.delete" )}} method="POST">
                @csrf
                <input type="hidden" name="courseId" value={{$id}}>
                <button type="submit" data-effect="mfp-zoom-in" class="btn_1 gray"><i class="fa fa-fw fa-trash"></i> Hapus Materi Ini</button>
            </form>
        </div>
        <span>{{ $duration }}</span>
    </div>
</li>