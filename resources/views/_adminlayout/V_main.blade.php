<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Octa-App</title>
    <meta name="author" content="Okta Jaya Harmaja">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/octaapp.style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.datatables.min.css') }}">

    <script type="text/javascript" src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/sweetalert.min.js') }}"></script>
  </head>
  <body>
    <div id="main-wrapper">
      <div id="left-wrapper" class="active">
        <div class="left-wrapper active">
          <div class="left-header">
  					<div class="left-header-images">
  						<img src="{{ asset('image/head-title.jpg') }}">
  					</div>
  				</div>
          @include('_adminlayout.V_sidebar')
        </div>

      </div>

      <div id="right-wrapper">
  			@include('_adminlayout.V_navbar')
  			<div class="main-content container-fluid">
  				@yield('content_page')
  			</div>
  		</div>
    </div>
  </body>
  <script type="text/javascript">
		$(function(){
      $('.datepicker').datetimepicker({
				format: 'YYYY-MM-DD'
			});
		});
	</script>
</html>
