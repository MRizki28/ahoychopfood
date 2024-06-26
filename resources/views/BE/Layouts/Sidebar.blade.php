		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{asset('static/img/profile.jpg')}}" alt="" class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Rizki
									<span class="user-level" id="user-level">Admin</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>
							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="{{ url('setting') }}">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
							<a href="{{ url('/') }}">
								<i class="fa-solid fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li> 
						{{-- <li class="nav-item {{ request()->is('cms/be/category*') ? 'active' : '' }}">
                            <a href="{{ url('/cms/be/category') }}">
                                <i class="fas fa-file"></i>
                                <p>Kategori</p>
                            </a>
                        </li>    --}}
						<li class="nav-item {{ request()->is('cms/be/menu*') ? 'active' : '' }}">
                            <a href="{{ url('/cms/be/menu') }}">
                                <i class="fas fa-concierge-bell"></i>
                                <p>Menu</p>
                            </a>
                        </li>   
						<li class="nav-item {{ request()->is('cms/be/information*') ? 'active' : '' }}">
                            <a href="{{ url('/cms/be/information') }}">
                                <i class="fab fa-blogger"></i>
                                <p>Information</p>
                            </a>
                        </li>   
					<ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->