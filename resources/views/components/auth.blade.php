<!DOCTYPE html>
<html lang="en">

@include("components.header")
<body id={{ isset($idName) ? $idName : "login_bg" }}>
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	
	<div id="login">
	@yield('section')
	</div>
	<!-- /login -->
		
	<!-- COMMON SCRIPTS -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
	<script src="assets/validate.js"></script>	
  
</body>

@include("components.script")
@stack("scripts")

</html>