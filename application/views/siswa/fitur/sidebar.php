<div class="fixed-sidebar-left">
	<ul class="nav navbar-nav side-nav nicescroll-bar">

		<li>
			<div class="user-profile text-center">
				<img src="<?php echo base_url()?>assets/img/user/<?php echo $this->session->userdata('foto'); ?>" alt="user_auth" class="user-auth-img img-circle" />
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
			<a id="satu" href="<?php echo base_url() ?>">
				<div class="pull-left"><i class="zmdi zmdi-home mr-20"></i><span class="right-nav-text">Home</span></div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a id="satu" href="<?php echo base_url() ?>user">
				<div class="pull-left"><i class="zmdi zmdi-view-dashboard mr-20"></i><span class="right-nav-text">Menu</span></div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<a id="satu" href="<?php echo base_url() ?>User/edit_mahasiswa/<?php echo $this->session->userdata('id_user');?>">
				<div class="pull-left"><i class="zmdi zmdi-settings mr-20"></i><span class="right-nav-text">Pengaturan</span></div>
				<div class="clearfix"></div>
			</a>
		</li>
		<li>
			<li>
				<hr class="light-grey-hr mb-10" />
			</li>
			<li>
				<a href="<?php echo base_url() ?>logout">
					<div class="pull-left"><i class="zmdi zmdi-power mr-20"></i><span class="right-nav-text">Logout</span></div>
					<div class="clearfix"></div>
				</a>
			</li>
		</li>
	</ul>
</div>

<div class="right-sidebar-backdrop"></div>