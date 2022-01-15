<div class="box_detail">
    <h4 class="text-center">Gabung Materi</h4>
    <p class="nopadding">Tekan tombol Gabung Sekarang untuk bisa membaca materi secara lengkap.</p>
    <div id="message-contact"></div>
    <form method="POST" action={{ route('course.join.post') }} id="contactform" autocomplete="off">
        @csrf
        <div class="row">
            <input type="hidden" id="slug" name="slug" value={{ $slug }}>
            @if(Auth::guard('siswa')->user())
            <input type="hidden" id="user_id" name="user_id" value={{ Auth::guard('siswa')->user()->id }}>
            @endif
        <div style="position:relative;" class="mt-4">
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            This is a danger alert—check it out!
        </div>
    @endif
     @if(!Auth::guard('siswa')->check())
      <button type="submit" disabled  class="btn_1 full-width" id="submit-contact">
           {{ $titleBtn }}
       </button>  
       @else
       <button type="submit" class="btn_1 full-width" id="submit-contact">
        {{ $titleBtn }}
       </button>
     @endif
    </div> 
    </form>
</div>