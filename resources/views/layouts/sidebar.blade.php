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
						<li class="nav-item {{ request()->is('user','add_user') ? 'active' : '' }}" >
							<a href="{{ route('user') }}">
								<i class="fas fa-layer-group"></i>
								<p>Users</p>
							</a>
						</li>
						{{-- <li class="nav-item {{ request()->is('user','add_user') ? 'active' : '' }}">
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
						</li> --}}
						<li class="nav-item {{ request()->is('laporan_servis','laporan_pemasukan','laporan_pesan') ? 'active' : '' }}">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Data Servis</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li class="{{ request()->is('laporan_servis') ? 'active' : '' }}">
										<a href="{{ route('laporan_servis') }}">
											<span class="sub-item">Laporan Data Servis</span>
										</a>
									</li>
									<li class="{{ request()->is('laporan_pemasukan') ? 'active' : '' }}">
										<a href="{{ route('laporan_pemasukan') }}">
											<span class="sub-item">Laporan Pemasukan Bulanan</span>
										</a>
									</li>
									<li class="{{ request()->is('laporan_pesan') ? 'active' : '' }}">
										<a href="{{ route('laporan_pesan') }}">
											<span class="sub-item">Laporan Pesan Terkirim</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item {{ request()->is('show_beranda','show_profile','show_tips') ? 'active' : '' }}">
							<a data-toggle="collapse" href="#m_dashboard">
								<i class="fas fa-pen-square"></i>
								<p>Manajemen Dash</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="m_dashboard">
								<ul class="nav nav-collapse">
									<li class="{{ request()->is('show_beranda') ? 'active' : '' }}">
										<a href="{{ route('show_beranda') }}">
											<span class="sub-item">Manajemen Beranda</span>
										</a>
									</li>
									<li class="{{ request()->is('show_profile') ? 'active' : '' }}">
										<a href="{{ route('show_profile') }}">
											<span class="sub-item">Manajemen Profile</span>
										</a>
									</li>
									<li class="{{ request()->is('show_tips') ? 'active' : '' }}">
										<a href="{{ route('show_tips') }}">
											<span class="sub-item">Manajemen Tips Perawatan</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						@elseif(auth()->user()->level == 'teknisi')
						<li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}" >
							<a href="{{ route('dashboard') }}">
								<i class="fas fa-home"></i>
								<p>Dashboard Teknisi</p>
							</a>
						</li>

						<li class="nav-item {{ request()->is('servis','add_servis') ? 'active' : '' }}" >
							<a href="{{ route('teknisi') }}">
								<i class="fas fa-layer-group"></i>
								<p>Servis</p>
							</a>
						</li>
						
						{{-- <li class="nav-item {{ request()->is(['servis','add_servis','sms']) ? 'active' : '' }}">
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
						</li> --}}
						@endif
					
						
						
					</ul>
				</div>
			</div>
		</div>