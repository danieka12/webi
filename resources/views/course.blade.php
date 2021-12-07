@extends('components.app', ['title' => 'Online courses'])

@section('content')
	<main>
		@include('components.miniComponents.hero', ['title' => $labelTitle])
		<!--/hero_in-->
		@include('components.course.filter')
		<!-- /filters -->

		<div class="container margin_60_35">
			<div class="row">
				@foreach ($courseList as $course)
					@include('components.course.card-course', [
						'href' => route('homepage') . "/" . $course['href'], 
						'previewImage' => $course['previewImage'], 
						'courseLabel' => $course['courseLabel'], 
						'title' => $course['title'], 
						'desc' => $course['desc'], 
						'timeToComplete' => $course['timeToComplete'],
						'hasEnroll' => $course['hasEnroll'],
						'titlePreview' => 'Buka Materi',
						])
				@endforeach
			</div>
			<!-- /row -->

			@if (count($courseList) >= 9)
				<p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Lihat Materi Lain</a></p>
			@endif
			
		</div>
		<!-- /container -->
		
		@include('components.course.footer')
		<!-- /bg_color_1 -->
	</main>
	<!--/main-->

@endsection