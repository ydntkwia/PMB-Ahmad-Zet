<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
	$this->load->view('siswa/fitur/head');
	?>
</head>

<body onload="waktu()">
	<?php 
	$this->load->view('siswa/fitur/kepala');
	$this->load->view('siswa/fitur/sidebar');
	?>

	<!-- start content -->
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row heading-bg">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h5 class="txt-dark mobile-judul">Pengaturan Akun</h5>
				</div>
				<!-- Breadcrumb -->
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url() ?>user">Menu</a></li>
						<li><a href="<?php echo base_url() ?>edit-mahasiswa">Pengaturan Akun</a></li>
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
			if ($this->session->flashdata('message-wrong') != '' ) 
			{ 
				?>
				<div class="alert red-7-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> <?php echo $this->session->userdata('message-wrong'); ?>
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
						<form action="<?php echo base_url() ?>User/edit_mahasiswa_aksi" method="POST">
							<?php
							$no = 1;
							foreach ($edit as $key) {
								?>

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
									<button type="submit" name="login" class="btn btn-success">Simpan</button>
									<a class="btn btn-danger" href="<?php echo base_url()?>user-admin">kembali</a>
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
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Foto Data Diri</h6>
								<div class="h-1-px w-100 grey-3-bg"></div>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div style="background: url('<?php echo base_url()?>assets/img/user/<?php echo $this->session->userdata('foto');?>') no-repeat;" class="img-edit"></div>
								<div class="h-20-px"></div>
								<div class="h-20-px"></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- start to edit -->

		<!-- end of content -->


		<?php 
		$this->load->view('siswa/fitur/footer');
		$this->load->view('siswa/fitur/kaki');
		?>
	</body>
	</html>