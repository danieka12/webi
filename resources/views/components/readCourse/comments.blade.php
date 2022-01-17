<div id="comments">
    <h5>Komentar</h5>
    <ul>
        @foreach ($comments as $comment)
            @include('components.miniComponents.comments', [
            'id' => $comment['id'],
            'author_id' => $comment['author_id'],
            'author' => $comment['author'],
            'role' => $comment['role'],
            'content' => $comment['content'],
            'postAt' => $comment['postAt'],
            'replies' => $comment['reply'],
            ])
        @endforeach
    </ul>
</div>
