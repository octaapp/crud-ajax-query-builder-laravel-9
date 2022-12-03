<nav class="navbar navbar-header navbar-expand navbar-light">
	<a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
	<button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
			<li class='dropdown'>
				<a href='#' data-bs-toggle='dropdown' class='nav-link dropdown-toggle nav-link-lg nav-link-user'>
					<div class='d-none d-md-block d-lg-inline-block'>Hi, Okta Jaya Harmaja</div>
					<div class='avatar me-1'>
						<img src='{{ asset('image/default-user.jpg') }}' alt='' srcset=''>
					</div>
				</a>
				<div class='dropdown-menu dropdown-menu-end'>
					<a class='dropdown-item' href='".base_url('logout')."'><i class='feather-log-out'></i> Logout</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
