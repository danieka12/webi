<div class="bloglist singlepost">
    <p><img alt="" class="img-fluid img-responsive" src="{{ asset($coverImage) }}"></p>
    <h1 class="text-capitalize">{{ $title }}</h1>
    <div class="postmeta">
        <ul>
            <li><a href={{ route('course.search', ['label' => $label]) }}><i class="icon_folder-alt"></i>
                    {{ $label }}</a></li>
            <li><i class="icon_clock_alt"></i> {{ $createdAt }}</li>
            <li><a class="text-capitalize" href="{{ route('teacher.profile', ['id' => $toRead['teacherId']]) }}"><i
                        class="icon_user"></i> {{ $teacher }}</a></li>
            <li><a href="#"><i class="icon_comment_alt"></i> ({{ $comments }}) Komentar</a></li>
        </ul>
    </div>
    <!-- /post meta -->
    <div class="post-content">
        {!! $content !!}
    </div>
    <!-- /post -->
</div>
