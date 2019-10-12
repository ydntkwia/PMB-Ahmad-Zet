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
					<h5 class="txt-dark mobile-judul">User Admin</h5>
				</div>
				<!-- Breadcrumb -->
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url() ?>admin">Dashboard</a></li>
						<li><a class="active"><span>User</span></a></li>
						<li><a href="<?php echo base_url() ?>user-admin">User Admin</a></li>
						<li><a href="<?php echo base_url() ?>edit-admin">Edit Admin</a></li>
					</ol>
				</div>
				<!-- /Breadcrumb -->
			</div>
			<?php  
			if ($this->session->flashdata('berhasil') != '' ) 
			{ 
				?>
				<div class="alert green-7-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> <?php echo $this->session->userdata('berhasil'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
			}
			if ($this->session->flashdata('error') != '' ) 
			{ 
				?>
				<div class="alert red-7-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> <?php echo $this->session->userdata('error'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
			}
			?>
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Form Data</h6>
								<div class="h-1-px w-100 grey-3-bg"></div>
							</div>
							<div class="clearfix"></div>
						</div>
						<form action="<?php echo base_url() ?>Admin/edit_admin_aksi" method="POST">
							<?php
							$no = 1;
							foreach ($edit as $key) {
								?>
								<div class="form-group" >
									<label class="control-label mb-10 text-left">Username (NIDN)</label>
									<input name="wkwkwk" type="number" value="<?php echo $key->nidn ?>" class="form-control" onkeypress="input_number(event)" autocomplete="off" <?php if ($this->session->userdata('level')!='1'){echo"readonly";}?>>
								</div>
								<div class="form-group" style="display: none;">
									<label class="control-label mb-10 text-left">Nama lama</label>
									<input name="nama_lama" type="text" class="form-control" value="<?php echo $key->nama ?>" autocomplete="off" onkeypress="input_char(event)">
								</div>
								<div class="form-group" <?php if ($this->session->userdata('level')!='1'){echo"style='display: none;'";}?>>
									<label class="control-label mb-10 text-left">Nama</label>
									<input name="nama" type="text" class="form-control" value="<?php echo $key->nama ?>" autocomplete="off" onkeypress="input_char(event)">
								</div>
								<div></div>
								<label class="control-label mb-10 text-left">Ganti Password</label>
								<div id="edited"> 
									<div class="form-group">
										<label class="control-label mb-10 text-left">Password Lama</label>
										<input placeholder="kosongkan jika tidak ingin mengganti" name="password" type="password" class="form-control" value="" autocomplete="off">
									</div>
									<div class="form-group">
										<label class="control-label mb-10 text-left">Password Baru</label>
										<input placeholder="kosongkan jika tidak ingin mengganti" name="password_baru" type="password" class="form-control" value="" autocomplete="off">
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success">Simpan</button>
								</div>
								<?php
							}
							?>
						</form>
						<div class="h-20-px"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default card-view">

						<?php
						$no = 1;
						foreach ($edit as $key) {
							?>
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Foto Data Diri</h6>
									<div class="h-1-px w-100 grey-3-bg"></div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div style="background: url('<?php echo base_url()?>assets/img/admin/<?php echo $key->foto?>') no-repeat;" class="img-edit"></div>
									<div class="h-20-px"></div>
									<?php if ($this->session->userdata('level')!='1') {
									}else{
										?>
										<form action="<?php echo base_url() ?>Admin/aksi_upload" method="post" enctype="multipart/form-data">
											<div class="form-group" style="display: none;">
												<label class="control-label mb-10 text-left">Username (NIDN)</label>
												<input type="text" name="nidn" value="<?php echo $key->nidn ?>" class="form-control" onkeypress="input_char(event)" autocomplete="off">
											</div>
											<div class="form-group">
												<label class="control-label mb-10 text-left">Update Foto</label>
												<input type="file" name="berkas" class="form-control">
											</div>
											<div class="h-20-px"></div>
											<button type="submit" class="btn btn-success foto-edit">Simpan</button>
										</form>
									<?php } ?>
								</div>
							</div>
							<?php
						}
						?>

					</div>
				</div>

			</div>
		</div>
		<!-- start to edit -->

		<!-- end of content -->


		<?php 
		$this->load->view('admin/fitur/footer');
		$this->load->view('admin/fitur/kaki');
		?>
	</body>
	</html>