<li>
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
