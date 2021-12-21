@extends('admin.components.app')

@section('body')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
    @include('admin.components.miniComponents.breadcrumbs', ['currentPage' => 'Materi'])
		<div class="box_general">
			@include('admin.components.miniComponents.sorting')
			<div class="list_general reviews">
				<ul>
				@for ($i = 0; $i < 5; $i++)
					@include('admin.components.miniComponents.card-course', [
						'id' => $i,
						'title' => 'Course title',
						'dateTime' => 'June 15 2017',
						'cover' => 'images/admin/course_1.jpg',
						'description' => 'Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis ad. In vim mucius menandri convenire, an brute zril vis. Ancillae delectus necessitatibus no eam, at porro solet veniam mel, ad everti nostrud vim. Eam no menandri pertinacia deterruisset.'
					])
				@endfor
				</ul>
			</div>
		</div>
@endsection