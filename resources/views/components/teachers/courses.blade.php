<div class="indent_title_in">
    <i class="pe-7s-display1"></i>
    <h3>Daftar Materi Dosen</h3>
</div>
<div class="wrapper_indent">
    <div class="table-responsive">
        <table class="table table-striped add_bottom_30">
            <thead>
                <tr>
                    <th>Kategori Materi</th>
                    <th>Judul Materi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($meta['listCourses'] as $course)
                    <tr>
                        <td>{{ $course['category'] }}</td>
                        <td><a href="/{{ $course['href'] }}">{{ $course['title'] }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
