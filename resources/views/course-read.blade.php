@extends('components.app', ['title' => 'Your blog article title'])

@section('content')
	<main>
		@include('components.miniComponents.hero')
		<!--/hero_in-->

		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-12">
					@include('components.readCourse.post')
					<!-- /single-post -->


					<hr>
					@include('components.readCourse.comments')
					<h5>Leave a Comment</h5>
					@include('components.readCourse.comment-form')
				</div>
				<!-- /col -->
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
@endsection

@push('styles')
	<!-- SPECIFIC CSS -->
	<link href={{ asset("css/blog.css") }} rel="stylesheet">
@endpush