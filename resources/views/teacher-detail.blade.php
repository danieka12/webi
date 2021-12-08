@extends('components.app', ['withClass' => true, 'title' => 'Detail Guru'])


@section('content')
	<main>
		@include('components.miniComponents.hero', ['title' => 'detail guru'])
		<!--/hero_in-->
		<div class="container margin_60_35">
			<div class="row">
				@include('components.teachers.profile', [
					'teacherName' => 'Jenny Ghostbaum', 'siswaJoin' => 25, 
					'courses' => 20
					])
				<!--/aside -->

				@include('components.teachers.content')
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
@endsection
