
<!-- Citizen_side_bar -->

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:orange;">
				<!-- Brand Logo -->
				<a href="{{ route('citizen.dashboard') }}" class="brand-link">
					<img src="{{ asset('admin_assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight" style="color:black;"><strong>{{ Auth::guard('citizen')->user()->name }}</strong></span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user (optional) -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" >
							<!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
							<li class="nav-item">
								<a href="{{ route('citizen.dashboard') }}" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>Dashboard</p>
								</a>																
							</li>
							<li class="nav-item">
								<a href="{{ route('citizen.form') }}" class="nav-link">
									<i class="nav-icon fas fa-file-alt"></i>
									<p>Application Form</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('citizen.information', ['id' => Auth::id()]) }}" class="nav-link">
									<i class="nav-icon fas fa-user"></i>
									<p>Personal Information</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon  fas fa-file-alt"></i>
									<p>Roles</p>
								</a>
							</li>						
						</ul>
					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
</aside>