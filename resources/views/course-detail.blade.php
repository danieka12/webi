@extends('components.app', ['withClass' => true, 'title' => 'Online course detail'])

@section('content')
	<main>
		@include('components.courseDetail.hero')
		<!--/hero_in-->

		<div class="bg_color_1">
			@include('components.courseDetail.navigation')
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						@include('components.courseDetail.detail')
					</div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
						@include('components.courseDetail.join')
					</aside>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>
@endsection