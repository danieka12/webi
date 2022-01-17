<div class="container margin_30_95">
    <div class="main_title_2">
        <span><em></em></span>
        <h2>{{ $title }}</h2>
        <p>{{ $desc }}</p>
    </div>
    <div class="row">
        @foreach ($categories as $category)
            @include('components.miniComponents.category-course-card', ['title' => $category['title'], 'metaTitle' =>
            $category['metaTitle'], 'previewImage' => $category['previewImage'], 'href' => $category['href']])
        @endforeach
        <!-- /grid_item -->
    </div>
    <!-- /row -->
</div>
