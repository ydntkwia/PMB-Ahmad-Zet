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
					<h5 class="txt-dark mobile-judul">Registrasi Mahasiswa</h5>
				</div>
				<!-- Breadcrumb -->
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url() ?>admin">Dashboard</a></li>
						<li><a class="active"><span>Data Daftar</span></a></li>
						<li><a href="<?php echo base_url() ?>registrasi-mahasiswa">Registrasi Mahasiswa</a></li>
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
			if ($this->session->flashdata('delete_approve') != '' ) 
			{ 
				?>
				<div class="alert green-7-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> <?php echo $this->session->userdata('delete_approve'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
			}
			if ($this->session->flashdata('terima_calon') != '' ) 
			{ 
				?>
				<div class="alert green-7-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> <?php echo $this->session->userdata('terima_calon'); ?>
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
											<th>NIS</th>
											<th>Nama</th>
											<th width="300px">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($registrasi as $key) {
											$telp = $key->telp;
											$sub_telp =  substr($telp,1);
											$no_telp = "62".$sub_telp;
											$pesan = "https://web.whatsapp.com/send?phone=$no_telp&text=*Pengumuman*%0AHarap%20cek%20kembali%20data%20pendaftaran%20ulang%20Anda%2C%20agar%20tidak%20terjadi%20kesalahan%20data.%0AApakah%20sudah%20benar%20semua%3F%0A-Panitia%20Pendaftaran&source=&data=";
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
															window.location.href='<?php echo base_url() ?>Admin/ubah_pesan_b/<?php echo $key->id_daftar ?>';" href="javascript:void(0)"><i class="fa fa-comments"></i></a>
															<?php
														}
													}else{
														?>
														<a class=" btn grey-5-bg" href="javascript:void(0)"><i class="fa fa-comments"></i></a>
														<?php
													}
													?>
													<a class=" btn btn-info" style="color: white" href="<?php echo base_url() ?>Admin/edit_mhs/<?php echo $key->id_daftar ?>"><i class="fa fa-pencil"></i></a>
													<a class=" btn btn-success" style="color: white" data-toggle="modal" data-target="#approve<?php echo $key->id_daftar?>"><i class="fa fa-check"></i></a>
													<a class=" btn btn-danger delete-btn" style="color: white" data-toggle="modal" data-target="#delete<?php echo $key->id_daftar?>"><i class="fa fa-trash"></i></a>

													<!-- modal delete -->
													<div class="modal animated fadeInDown" style="animation-duration: 0.5s" id="delete<?php echo $key->id_daftar?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-body pt-35-px pb-35-px">
																	<center>
																		<span class="f-20-px">Hapus Data Mahasiswa?</span>
																	</center>
																</div>
																<div class="modal-footer">
																	<center>
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																		<button type="button" class="btn btn-danger" onclick="window.location.href='<?php echo base_url() ?>Admin/delete_calon/<?php echo $key->id_daftar ?>'">Delete</button>
																	</center>
																</div>
															</div>
														</div>
													</div>
													<!-- modal diterima -->
													<div class="modal animated fadeInDown" style="animation-duration: 0.5s" id="approve<?php echo $key->id_daftar?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-body pt-35-px pb-35-px">
																	<center>
																		<span class="f-20-px">Terima Mahasiswa?</span>
																	</center>
																</div>
																<div class="modal-footer">
																	<center>
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																		<button type="button" class="btn btn-success" onclick="window.location.href='<?php echo base_url() ?>Admin/terima_calon/<?php echo $key->id_daftar ?>'">Terima</button>
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