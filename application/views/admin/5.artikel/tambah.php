<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
	$this->load->view('admin/fitur/head');
	?>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
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
						<li><a class="active"><span>Artikel</span></a></li>
						<li><a href="<?php echo base_url() ?>artikel-tambahs">tambah</a></li>
					</ol>
				</div>
				<!-- /Breadcrumb -->
			</div>
			<?php  
			if ($this->session->flashdata('error') != '' ) 
			{ 
				?>
				<div class="alert red-6-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> <?php echo $this->session->userdata('error'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
			}
			if ($this->session->flashdata('success') != '' ) 
			{ 
				?>
				<div class="alert green-7-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> <?php echo $this->session->userdata('success'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
			}
			?>
			<div class="row">
				<form action="<?php echo base_url() ?>Admin/aksi_tambah_artikel" method="POST" enctype="multipart/form-data"> 
					<div class="col-md-8">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Form Isi Artikel</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<textarea name="isi" class="ckeditor" id="editor1"></textarea>
							<div class="h-20-px"></div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Form Artikel</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="form-wrap">
										<div class="form-group">
											<label class="control-label mb-10 text-left">Judul</label>
											<input required="" name="judul" type="text" class="form-control" value="" autocomplete="off" >
										</div>
										<div class="form-group">
											<label class="control-label mb-10 text-left">Tanggal</label>
											<input required="" name="tanggal" type="date" class="form-control" value="" autocomplete="off" >
										</div>
										<div class="form-group mt-20 mb-30">
											<label class="control-label mb-10 text-left">Kategori</label>
											<select required="" class="form-control" name="id_kategori">
												<option value="-Pilih-">-Pilih-</option>
												<?php  
												foreach ($kategori as $key) 
												{
													?>
													<option value="<?php echo $key->id_kategori ?>" ><?php echo $key->kategori ?></option>
													<?php
												}
												?>
											</select>
										</div>
										<div class="form-group">
											<label class="control-label mb-10 text-left">Gambar Artikel</label>
											<input name="berkas" type="file" class="form-control" required="">
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-success">Simpan</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>

				<div class="col-md-4">
					<div class="panel panel-default card-view">
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div class="form-wrap">
									<form action="<?php echo base_url() ?>Admin/aksi_tambah_kategori" method="POST">
										<div class="form-group">
											<label class="control-label mb-10 text-left">Tambah Kategori</label>
											<input required="" name="kategori_baru" type="text" class="form-control" value="" autocomplete="off" onkeypress="input_char(event)">
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-success">Simpan</button>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
												Edit
											</button>
										</div>
									</form>

									<!-- modal start -->
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Kelola Kategori</h5>
												</div>
												<div class="modal-body">
													<div class="table-wrap">
														<div class="table-responsive">
															<table id="datable_1" class="table table-hover display  pb-30">
																<thead>
																	<tr>
																		<th>No</th>
																		<th>Kategori</th>
																		<th width="100px">Aksi</th>
																	</tr>
																</thead>
																<tbody>
																	<?php 
																	$no =1;
																	foreach ($kategori as $key) {
																		?>
																		<tr>
																			<td><?php echo $no ?></td>
																			<td><?php echo $key->kategori ?></td>
																			<td>
																				<button class="btn green-7-bg mb-10-px" data-toggle="modal" data-target="#editData<?php echo $key->id_kategori ?>"><i class="fa fa-pencil"></i></button>

																				<a class=" btn bgc-5" style="color: white" data-toggle="modal" data-target="#delete<?php echo $key->id_kategori?>"><i class="fa fa-trash"></i></a>
																				
																				<!-- modal delete -->
																				<div class="modal animated fadeInDown" style="animation-duration: 0.5s" id="delete<?php echo $key->id_kategori?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
																					<div class="modal-dialog" role="document">
																						<div class="modal-content">
																							<div class="modal-body pt-35-px pb-35-px">
																								<center>
																									<span class="f-20-px">Hapus Kategori?</span>
																								</center>
																							</div>
																							<div class="modal-footer">
																								<center>
																									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																									<button type="button" class="btn bgc-5" onclick="window.location.href='<?php echo base_url() ?>Admin/hapus_kategori/<?php echo $key->id_kategori?>'">Delete</button>
																								</center>
																							</div>
																						</div>
																					</div>
																				</div>

																				<!-- tombol update -->
																				<div class="modal fade" id="editData<?php echo $key->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
																					<div class="modal-dialog" role="document">
																						<div class="modal-content">
																							<div class="modal-header">
																								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																									<span aria-hidden="true">&times;</span>
																								</button>
																							</div>
																							<form action="<?php echo base_url() ?>Admin/edit_kategori/<?php echo $key->id_kategori ?>" method="POST">
																								<div class="modal-body">
																									<input type="text" name="kategori" class="form-control" value="<?php echo $key->kategori ?>" >
																								</div>
																								<div class="modal-footer">
																									<button type="submit" class="btn btn-success">Update</button>
																								</div>
																							</form>
																						</div>
																					</div>
																				</div>
																			</td>

																		</tr>
																		<?php
																		$no++;
																	}
																	?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn red-6-bg" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									<!-- modal end -->

								</div>
							</div>
						</div>
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
		


		<script type="text/javascript">
			CKEDITOR.replace( 'editor1' );
		</script>

	</body>
	</html>