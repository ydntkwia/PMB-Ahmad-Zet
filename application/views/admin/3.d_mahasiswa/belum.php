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
					<h5 class="txt-dark mobile-judul">Calon Mahasiswa</h5>
				</div>
				<!-- Breadcrumb -->
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url() ?>admin">Dashboard</a></li>
						<li><a class="active"><span>Data Daftar</span></a></li>
						<li><a href="<?php echo base_url() ?>calon-mahasiswa">Calon Mahasiswa</a></li>
					</ol>
				</div>
				<!-- /Breadcrumb -->
			</div>
			<?php  
			$connected = @fsockopen("www.google.com", 80); 
			if ($connected){
			}else{
				?>
				<div class="alert red-7-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> Koneksi bermasalah, Anda tidak bisa mengirim pesan pengumuman!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
			}
			if ($this->session->flashdata('delete_belum') != '' ) 
			{ 
				?>
				<div class="alert green-7-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> <?php echo $this->session->userdata('delete_belum'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
			}
			?>
			<div class="row">
				<div class="col-12">
					<div class="panel panel-default card-view">
						<div class="table-wrap">
							<div class="table-responsive">
								<table id="datable_1" class="table table-hover display  pb-30">
									<thead>
										<tr>
											<th>No</th>
											<th>NISN</th>
											<th>Nama</th>
											<th width="180px">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($belum as $key) {
											$username = $key->nis;
											$password = "12345678";
											$telp = $key->telp;
											$sub_telp =  substr($telp,1);
											$no_telp = "62".$sub_telp;
											$pesan = "https://web.whatsapp.com/send?phone=$no_telp&text=*Pengumuman*%0ASilahkan%20login%20untuk%20mengisi%20form%20registrasi%20ulang.%0AUsername%20%3A%20*$key->nis*%20(NISN%20Anda)%0APassword%20%3A%20*12345678*%0AJangan%20berikan%20akun%20ini%20kepada%20siapapun!%0A-Panitia%20Pendaftaran&source=&data=";
											?>
											<tr>
												<td><?php echo $no ?></td>
												<td><?php echo $key->nis; ?></td>
												<td><?php echo $key->nama; ?></td>
												<td>
													<?php
													$connected = @fsockopen("www.google.com", 80); 
													if ($connected){
														if ($key->id_status_pesan == '1') {
														} else
														{
															?>
															<a class=" btn blue-5-bg" onclick="window.open('<?php echo $pesan ?>');
															window.location.href='<?php echo base_url() ?>Admin/ubah_pesan_a/<?php echo $key->id_daftar ?>';" href="javascript:void(0)"><i class="fa fa-comments"></i></a>
															<?php
														}
													}else{
														?>
														<a class=" btn grey-5-bg" href="javascript:void(0)"><i class="fa fa-comments"></i></a>
														<?php
													}
													?>
													<a class=" btn btn-danger delete-btn" style="color: white" data-toggle="modal" data-target="#delete<?php echo $key->id_user?>"><i class="fa fa-trash"></i></a>
													<!-- modal delete -->
													<div class="modal animated fadeInDown" style="animation-duration: 0.5s" id="delete<?php echo $key->id_user?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-body pt-35-px pb-35-px">
																	<center>
																		<span class="f-20-px">Hapus Calon Mahasiswa?</span>
																	</center>
																</div>
																<div class="modal-footer">
																	<center>
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																		<button type="button" class="btn btn-danger" onclick="window.location.href='<?php echo base_url() ?>Admin/delete_belum/<?php echo $key->id_daftar ?>'">Delete</button>
																	</center>
																</div>
															</div>
														</div>
													</div>
												</td>
											</tr>
											<?php
											$no++;
										} ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="h-20-px"></div>
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