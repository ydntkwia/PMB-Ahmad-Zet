<div class="fixed-sidebar-left">
	<ul class="nav navbar-nav side-nav nicescroll-bar">

		<li>
			<div class="user-profile text-center">
				<img src="<?php echo base_url()?>assets/img/admin/<?php echo $this->session->userdata('foto'); ?>" alt="user_auth" class="user-auth-img img-circle" />
				<div class="dropdown mt-5">
					<a href="#" class="dropdown-toggle pr-0 bg-transparent" data-toggle="dropdown"><?php echo $this->session->userdata('nama'); ?></a>

				</div>
			</div>
		</li>
		<li class="navigation-header">
			<span>Main</span>
			<i class="zmdi zmdi-more"></i>
		</li>
		<li>
			<a href="<?php echo base_url() ?>">
				<div class="pull-left"><i class="zmdi zmdi-home mr-20"></i><span class="right-nav-text">Home</span></div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a id="satu" href="<?php echo base_url() ?>admin">
				<div class="pull-left"><i class="zmdi zmdi-view-dashboard mr-20"></i><span class="right-nav-text">Dashboard</span></div>
				<div class="clearfix"></div>
			</a>
		</li>
		<?php 
		if ($this->session->userdata('level') == '3') {

		}
		else{
			?>
			<li>
				<a id="dua" href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr">
					<div class="pull-left"><i class="fa fa-table mr-20"></i><span class="right-nav-text">Data Daftar</span></div>
					<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
					<div class="clearfix"></div>
				</a>
				<ul id="app_dr" class="collapse collapse-level-1">
					<li>
						<a id="tiga" href="<?php echo base_url()?>pendaftar">Data Pendaftar</a>
					</li>
					<li>
						<a id="empat" href="<?php echo base_url()?>calon-mahasiswa">Calon Mahasiswa</a>
					</li>
					<li>
						<a id="empat" href="<?php echo base_url()?>registrasi-mahasiswa">Registrasi Mahasiswa</a>
					</li>
					<li>
						<a id="lima" href="<?php echo base_url()?>diterima">Data Diterima</a>
					</li>
				</ul>
			</li>
			<?php 
		}
		if ($this->session->userdata('level') != '1') {

		}
		else{
			?>
			<li>
				<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dw">
					<div class="pull-left"><i class="fa fa-user mr-20"></i><span class="right-nav-text">User</span></div>
					<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
					<div class="clearfix"></div>
				</a>
				<ul id="app_dw" class="collapse collapse-level-1">
					<li>
						<a href="<?php echo base_url()?>user-admin">Admin</a>
					</li>
					<li>
						<a href="<?php echo base_url()?>user-mahasiswa">Mahasiswa</a>
					</li>
				</ul>
			</li>
			<?php
		}
		if ($this->session->userdata('level') == '2') {

		}
		else{
			?>
			<li>
				<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dq">
					<div class="pull-left"><i class="fa fa-edit mr-20"></i><span class="right-nav-text">Artikel</span></div>
					<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
					<div class="clearfix"></div>
				</a>
				<ul id="app_dq" class="collapse collapse-level-1">
					<li>
						<a href="<?php echo base_url()?>artikel-tambah">Tambah</a>
					</li>
					<li>
						<a href="<?php echo base_url()?>artikel-kelola">Kelola</a>
					</li>
				</ul>
			</li>
			<?php
		}
		if ($this->session->userdata('level') != '1') {

		}
		else{
			?>
			<li>
				<a id="satu" href="<?php echo base_url() ?>laporan">
					<div class="pull-left"><i class="zmdi zmdi-file mr-20"></i><span class="right-nav-text">Laporan</span></div>
					<div class="clearfix"></div>
				</a>
			</li>
			<?php
		}
		?>
		<li>
			<a id="satu" href="<?php echo base_url() ?>Admin/edit_admin/<?php echo $this->session->userdata('id_user'); ?>">
				<div class="pull-left"><i class="zmdi zmdi-settings mr-20"></i><span class="right-nav-text">Setting</span></div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<hr class="light-grey-hr mb-10" />
		</li>
		<li>
			<a href="<?php echo base_url() ?>logout-admin">
				<div class="pull-left"><i class="zmdi zmdi-power mr-20"></i><span class="right-nav-text">Logout</span></div>
				<div class="clearfix"></div>
			</a>
		</li>
	</ul>
</div>

<div class="right-sidebar-backdrop"></div>