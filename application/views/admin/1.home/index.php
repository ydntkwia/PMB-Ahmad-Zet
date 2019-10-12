<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
	$this->load->view('admin/fitur/head');
	?>
</head>

<body onload="waktu()">
	<?php 
	$this->load->view('admin/fitur/kepala');
	$this->load->view('admin/fitur/sidebar');
	?>

	<!-- start content -->
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row heading-bg">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h5 class="txt-dark mobile-judul">Dashboard</h5>
				</div>
				<!-- Breadcrumb -->
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url() ?>admin">Home</a></li>
						<li><a class="active"><span>Dashboard</span></a></li>
					</ol>
				</div>
				<!-- /Breadcrumb -->
			</div>
			<div class="row">

				<!-- start to edit -->
				<a href="<?php echo base_url() ?>">
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 objek">
						<div class="panel panel-default card-view pa-0 bgc-1">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter">Menu</span>
													<span class="weight-500 uppercase-font block font-13 txt-light">Home</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="icon-home data-right-rep-icon txt-light"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
				<?php 
				if ($this->session->userdata('level') == '3') {
					
				}
				else{
					?>
					<a href="<?php echo base_url() ?>pendaftar">
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 objek">
							<div class="panel panel-default card-view pa-0 bgc-2">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter"><span class="counter-anim"><?php echo $daftar ?></span></span>
														<span class="weight-500 uppercase-font block txt-light">Pendaftar</span>
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="icon-user data-right-rep-icon txt-light"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<a href="<?php echo base_url() ?>calon-mahasiswa">
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 objek">
							<div class="panel panel-default card-view pa-0 bgc-2">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 txt-light data-wrap-left">
														<span class="block counter"><span class="counter-anim">
															<?php echo $calon ?>
														</span></span>
														<span class="weight-500 uppercase-font block">Calon</span>
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 txt-light data-wrap-right">
														<i class=" icon-user-follow data-right-rep-icon"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<a href="<?php echo base_url() ?>registrasi-mahasiswa">
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 objek">
							<div class="panel panel-default card-view pa-0 bgc-2">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 txt-light data-wrap-left">
														<span class="block counter"><span class="counter-anim">
															<?php echo $registrasi ?>
														</span></span>
														<span class="weight-500 uppercase-font block">Registrasi Ulang</span>
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 txt-light data-wrap-right">
														<i class=" icon-user-follow data-right-rep-icon"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<a href="<?php echo base_url() ?>diterima">
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 objek">
							<div class="panel panel-default card-view pa-0 bgc-2">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter"><span class="counter-anim"><?php echo $diterima ?></span></span>
														<span class="weight-500 uppercase-font block txt-light">Diterima</span>
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 txt-light data-wrap-right">
														<i class=" icon-user-following data-right-rep-icon"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<?php 
				}
				if ($this->session->userdata('level') != '1') {
				}
				else{
					?>
					<a href="<?php echo base_url() ?>user-admin">
						<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 objek">
							<div class="panel panel-default card-view pa-0 bgc-3">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter">User</span>
														<span class="weight-500 uppercase-font block font-13 txt-light">Admin</span>
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="fa fa-user data-right-rep-icon txt-light"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<a href="<?php echo base_url() ?>user-mahasiswa">
						<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 objek">
							<div class="panel panel-default card-view pa-0 bgc-3">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter">User</span>
														<span class="weight-500 uppercase-font block font-12 txt-light">Mahasiswa</span>
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="fa fa-university data-right-rep-icon txt-light"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<?php
				}
				if ($this->session->userdata('level') == '2') {
				}
				else{
					?>
					<a href="<?php echo base_url() ?>artikel-tambah">
						<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 objek">
							<div class="panel panel-default card-view pa-0 bgc-4">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter">Artikel</span>
														<span class="weight-500 uppercase-font block font-13 txt-light">Tambah</span>
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="fa fa-pencil data-right-rep-icon txt-light"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<a href="<?php echo base_url() ?>artikel-kelola">
						<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 objek">
							<div class="panel panel-default card-view pa-0 bgc-4">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter">Artikel</span>
														<span class="weight-500 uppercase-font block font-13 txt-light">kelola	</span>
													</div>
													<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="fa fa-edit data-right-rep-icon txt-light"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<?php
				}
				if ($this->session->userdata('level') != '1') {
				}
				else{
					?>
					<a href="<?php echo base_url() ?>laporan">
						<div class="col-lg-1 col-md-6 col-sm-6 col-xs-12 objek">
							<div class="panel panel-default card-view pa-0 bgc-7">
								<div class="panel-wrapper collapse in">
									<div class="panel-body pa-0">
										<div class="sm-data-box">
											<div class="container-fluid">
												<div class="row">
													
													<div class="ps col-xs-6 text-center pl-0 pr-0 data-wrap-left">
														<span class="txt-light block counter">Cetak</span>
														<span class="weight-500 uppercase-font block font-13 txt-light">Laporan</span>
													</div>
													<div class="ps col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
														<i class="zmdi zmdi-file data-right-rep-icon txt-light"></i>
													</div>

													<div class="col-xs-12 text-center  pl-0 pr-0 data-wrap-right ph" >
														<i class="zmdi zmdi-file data-right-rep-icon txt-light"></i>
													</div>	

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<?php
				}
				?>
				<a href="<?php echo base_url() ?>Admin/edit_admin/<?php echo $this->session->userdata('id_user'); ?>">
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 objek">
						<div class="panel panel-default card-view pa-0 bgc-5">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter">Akun</span>
													<span class="weight-500 uppercase-font block font-13 txt-light">Pengaturan</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-settings data-right-rep-icon txt-light"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
				<a href="<?php echo base_url() ?>logout-admin">
					<div class="col-lg-1 col-md-6 col-sm-6 col-xs-12 objek">
						<div class="panel panel-default card-view pa-0 bgc-7">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-12 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-power data-right-rep-icon txt-light"></i>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>

			</div>
		</div>
		<!-- end of content -->


		<?php 
		$this->load->view('admin/fitur/footer');
		$this->load->view('admin/fitur/kaki');
		?>
		<script type="text/javascript">
			$("#satu").addClass('active');
		</script>
	</body>
	</html>