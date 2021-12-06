<div class="bg_color_1">
    <div class="container margin_120_95">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>{{ $title }}</h2>
            <p>{{ $desc }}</p>
        </div>
        <div class="row">
           @foreach ($newsAndEvents as $newsAndEvent)
               @include('components.miniComponents.news-card', ['title' => $newsAndEvent['title'], 'desc' => $newsAndEvent['desc'], 'author' => $newsAndEvent['author'], 'dateTime' => $newsAndEvent['dateTime'], 'href' => $newsAndEvent['href'], 'meta' => $newsAndEvent['meta']])
           <!-- /box_news -->
           @endforeach
        </div>
        <!-- /row -->
        <p class="btn_home_align"><a href="blog.html" class="btn_1 rounded">{{ isset($viewMore) ? $viewMore : 'Lihat semua berita' }}</a></p>
    </div>
    <!-- /container -->
</div>