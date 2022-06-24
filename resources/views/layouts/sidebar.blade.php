		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{ Auth::user()->nama }}
									<span class="user-level">{{ Auth::user()->level }}</span>
									
								</span>
							</a>
							<div class="clearfix"></div>

							
						</div>
					</div>
					<ul class="nav">
						@if(auth()->user()->level == 'admin')
						<li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}" >
							<a href="{{ route('dashboard') }}">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item {{ request()->is('user','add_user') ? 'active' : '' }}">
							<a data-toggle="collapse" href="#users">
								<i class="fas fa-layer-group"></i>
								<p>Users</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="users">
								<ul class="nav nav-collapse">
									<li class="{{ request()->is('user') ? 'active' : '' }}">
										<a href="{{ route('user') }}">
											<span class="sub-item">Data User</span>
										</a>
									</li>
                                    <li class="{{ request()->is('add_user') ? 'active' : '' }}">
										<a href="{{ route('add_user') }}">
											<span class="sub-item">Data Baru</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Data Servis</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="#">
											<span class="sub-item">Basic Form</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						@elseif(auth()->user()->level == 'teknisi')
						<li class="nav-item" >
							<a href="#">
								<i class="fas fa-home"></i>
								<p>Dashboard Teknisi</p>
							</a>
						</li>
						
						<li class="nav-item {{ request()->is(['servis','add_servis','sms']) ? 'active' : '' }}">
							<a data-toggle="collapse" href="#users">
								<i class="fas fa-layer-group"></i>
								<p>Servis</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="users">
								<ul class="nav nav-collapse">
									<li class="{{ request()->is('servis') ? 'active' : '' }}">
										<a href="{{ route('teknisi') }}">
											<span class="sub-item">Data Servis</span>
										</a>
									</li>
                                    <li class="{{ request()->is('add_servis') ? 'active' : '' }}">
										<a href="{{ route('add_servis') }}">
											<span class="sub-item">Data Baru</span>
										</a>
									</li>
									<li class="{{ request()->is('sms') ? 'active' : '' }}">
										<a href="{{ route('sms') }}">
											<span class="sub-item">Kirim SMS</span>
										</a>
									</li>

								</ul>
							</div>
						</li>
						@endif
					
						
						
					</ul>
				</div>
			</div>
		</div>