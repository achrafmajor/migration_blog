<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RedevEdu</title>
    <!-- style -->
    @include('admin.layout.parts.css')
    @yield('css')
</head>
<body>
    <!-- Page content -->
    @include('login.header')
    <div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Inner content -->
			<div class="content-inner">
				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-center">
					@include('admin.layout.parts.errors')
					<!-- Login form -->
                @yield("content")
					<!-- /login form -->

				</div>
				<!-- /content area -->


				<!-- Footer -->
                @include('login.footer')
				<!-- /footer -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
</body>


</html>
