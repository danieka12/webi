<div class="col-lg-6">
    <a class="box_news" href={{ $href }}>
        <figure>
            <img src={{ $meta['imagePreview'] }} alt="" />
            <figcaption><strong>{{ $meta['date'] }}</strong>{{ $meta['month'] }}</figcaption>
        </figure>
        <ul>
            <li>{{ $author }}</li>
            <li>{{ $dateTime }}</li>
        </ul>
        <h4>{{ $title }}</h4>
        <p>{{ $desc }}</p>
    </a>
</div>
