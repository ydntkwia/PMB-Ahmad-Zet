<!doctype html>
<html lang="en">
<head>
	<?php 
	$this->load->view('Index/fitur/head');
	?>
	<style type="text/css">
		.form-control{
			box-shadow: 0 0 0 0.125rem rgb(242,242,242)
		}
	</style>
</head>
<body data-spy="scroll" data-target=".navbar .in" class="has-loading-screen" >

	<?php 
	$this->load->view('Index/fitur/navbar');?>

	<div class="row grey-1-bg">
		<div class="col-md-12">
			<div class="container">
				<div class="h-100-px"></div>
				<div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="container">
								<div class="h-20-px"></div>
								<font class="red-7-font f-bold f-20-px">DAFTAR</font>
								<div class="w-20 h-2-px red-6-bg mt-2-px"></div>
								<div class="h-20-px"></div>
								<center>
									<img src="<?php echo base_url() ?>/assets/svg/daftar2.svg" class="w-40 svg-daftar">
								</center>
								<div class="h-40-px "></div>
								<center>
									<div class="grey-2-bg h-1-px w-90"></div>
								</center>
								<div class="h-20-px "></div>
								<?php  
								if ($this->session->flashdata('berhasil_daftar') != '' ) 
								{ 
									?>
									<div class="alert green-7-bg alert-dismissible show white-font" role="alert">
										<strong>Alert!</strong> <?php echo $this->session->userdata('berhasil_daftar'); ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<?php
								}  
								if ($this->session->flashdata('gagal_daftar') != '' ) 
								{ 
									?>
									<div class="alert red-7-bg alert-dismissible show white-font" role="alert">
										<strong>Alert!</strong> <?php echo $this->session->userdata('gagal_daftar'); ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<?php
								}
								?>
								<div class="row ml-10-px mr-10-px mt-10-px daftar-mobile">
									<div class="col-md-9 ">

										<form action="<?php echo base_url() ?>Index/create" method="POST" enctype="multipart/form-data">

											<input required="" onkeypress="input_number(event)" type="number" class="form-control mb-15-px" 	name="nis" autocomplete="off" placeholder="NISN" >

											<input required="" type="text" class="form-control mb-15-px" name="nama" autocomplete="off" placeholder="Nama Lengkap">

											<select required="" name="id_jk" class="form-control mb-15-px">
												<option class="form-control" value="null">- Jenis Kelamin -</option>
												<?php
												foreach ($jk as $key) {
													?>
													<option class="form-control" value="<?php echo $key->id_jk ?>"><?php echo $key->jk ?></option>
													<?php
												}
												?>
											</select>

											<textarea required="" class="form-control mb-15-px" name="alamat" placeholder="Alamat Lengkap" value="" ></textarea>

											<input required="" onkeypress="input_number(event)" type="text" class="form-control mb-15-px" name="telp" autocomplete="off" placeholder="Nomor Whatsapp Aktif(ex:08122222)" >

											<input required="" type="text" class="form-control mb-15-px" name="sekolah" autocomplete="off" placeholder="Nama Sekolah pendidikan terakhir" >

											<input required="" type="file" name="berkas" class="form-control mb-15-px">
											<label>*Foto harus sesuai dengan <a href="javascript:void(0)" data-toggle="modal" data-target="#ketentuan">ketentuan!</a></label>

											<div class="modal fade" id="ketentuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title grey-6-font f-up" id="exampleModalLabel">Ketentuan Foto</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<ol class="grey-6-font">
																<li>Background berwarna merah.</li>
																<li>Menggunakan seragam putih polos.</li>
																<li>Foto setengah badan.</li>
																<li>Ukuran foto 4cmx3cm.</li>
															</ol>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>

											<div class="h-10-px"></div>

											<button type="submit" value="submit" class="btn btn-success"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Daftar</button>&nbsp;
											<button type="reset" class="btn btn-danger"><i class="fa fa-recycle"></i>&nbsp;&nbsp;Reset</button>
										</form>
										<div class="h-20-px"></div>

									</div>
									<div class="col-md-3">
									</div>
								</div>
								<div class="h-20-px" ></div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<?php 
						$this->load->view('Index/fitur/side-berita');
						$this->load->view('Index/fitur/side-kategori');

						?>
					</div>
				</div>
			</div>
			<div class="h-50-px"></div>
		</div>
	</div>

	<?php $this->load->view('Index/fitur/footer2');
	?>
	<script type="text/javascript">
		$(".ketiga").addClass("active");
		$(".pertama").removeClass("active");
		$('#penanda').addClass("in");

	</script>
	</html>