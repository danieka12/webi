<li>
    <div class="avatar">
        <a href="#"><img src="http://via.placeholder.com/150x150/ccc/fff/avatar1.jpg" alt="">
        </a>
    </div>
   @include('components.miniComponents.mini-comments')
    @foreach ($replies as $reply)
        @include('components.miniComponents.reply-comments', [
                'id' => $reply['id'],
                'author_id' => $reply['author_id'],
                'author' => $reply['author'],
                'role' => $reply['role'],
                'content' => $reply['content'],
                'postAt' => $reply['postAt'],
        ])
    @endforeach
</li>
    