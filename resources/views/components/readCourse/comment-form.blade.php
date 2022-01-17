<form method="POST" action={{ route('course.comments.create') }}>
    @csrf
    <input type="text" hidden name="courseId" value={{ $toRead['id'] }}>
    <input type="text" hidden name="studentId" value={{ Auth::guard('siswa')->check() ? Auth::guard('siswa')->user()->id : "" }}>
    <input type="text" hidden name="teacherId" value={{ Auth::guard('guru')->check() ? Auth::guard('guru')->user()->id : "" }}>

    <div class="form-group">
        <textarea class="form-control" name="comments" id="comments2" rows="6"
            placeholder="Tulis komentar terbaikmu disini"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" id="submit2" class="btn_1 rounded add_bottom_30"> Kirim Komentar</button>
    </div>
</form>
