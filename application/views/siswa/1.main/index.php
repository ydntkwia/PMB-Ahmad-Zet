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
					<h5 class="txt-dark mobile-judul">Dahboard</h5>
				</div>
				<!-- Breadcrumb -->
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url() ?>user">Menu</a></li>
					</ol>
				</div>
				<!-- /Breadcrumb -->
			</div>
			<?php
			if ($this->session->flashdata('gagal_regis') != '' ) 
			{ 
				?>
				<div class="alert green-7-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> <?php echo $this->session->userdata('gagal_regis'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
			}
			if ($this->session->flashdata('message_true') != '' ) 
			{ 
				?>
				<div class="alert green-7-bg alert-dismissible show" role="alert">
					<strong>Alert!</strong> <?php echo $this->session->userdata('message_true'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
			}
			?>
			<div class="row">
				<div class="col-12">
					<?php
					foreach ($tbl_daftar as $key) {
						if ($key->id_status == '2') {
							?>
							<div class="panel panel-default card-view">
								<div class="table-wrap">
									<?php 
									foreach ($tbl_daftar as $key) {
										?>
										<form action="<?php echo base_url('User/input_data') ?>" method="POST">
											<div class="card-body">
												<h4 class="card-title" style="opacity: 0">Nothing</h4>

												<!-- root:: -------------------------------------------------------->
												<div class="form-group row" style="display: none !important;">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">ID DAFTAR</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname" name="id_daftar" value="<?php echo $key->id_daftar ?>" readonly>
													</div>
													<div class="col-sm-5"></div>
												</div>

												<!-- 0.-------------------------------------------------------->
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">NIS</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  value="<?php echo $key->nis ?>" readonly>
													</div>
													<div class="col-sm-5"></div>
												</div>

												<!-- 1.-------------------------------------------------------->
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  value="<?php echo $this->session->userdata('nama'); ?>" readonly>
													</div>
													<div class="col-sm-5"></div>
												</div>

												<!-- 2.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Jenis Kelamin</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  value="<?php echo $key->jk ?>" readonly>
													</div>
													<div class="col-sm-5"></div>
												</div>

												<!-- 3.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Alamat</label>
													<div class="col-sm-5">
														<textarea class="form-control ta-dead" readonly=""><?php echo $key->alamat ?></textarea>
													</div>
													<div class="col-sm-5"></div>
												</div>

												<!-- 4.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Tempat/Tgl Lahir</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  name="tempat_lahir" onkeypress="input_char(event)">
													</div>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="date" class="form-control" id="lname"  name="tanggal_lahir">
													</div>
												</div>

												<!-- 5.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Kewarganegaraan</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  name="kewarganegaraan" onkeypress="input_char(event)">
													</div>
													<div class="col-sm-5">
													</div>
												</div>

												<!-- 6.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Nomor Telp</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" value="<?php echo $key->telp ?>" id="lname"  readonly onkeypress="input_number(event)">
													</div>
													<div class="col-sm-5">
													</div>
												</div>

												<!-- 7.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Agama</label>
													<div class="col-sm-5">
														<select name="id_agama" class="form-control">
															<option value="null">-Pilih-</option>
															<?php 
															foreach ($agama as $key2) {
																?>
																<option value="<?php echo $key2->id_agama ?>"><?php echo $key2->agama ?></option>
																<?php
															}
															?>
														</select>
													</div>
													<div class="col-sm-5">
													</div>
												</div>

												<!-- 8.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Status Marital</label>
													<div class="col-sm-5">
														<select name="id_marital" class="form-control">
															<option value="null">-Pilih-</option>
															<?php 
															foreach ($marital as $key3) {
																?>
																<option value="<?php echo $key3->id_marital ?>"><?php echo $key3->marital ?></option>
																<?php
															}
															?>
														</select>
													</div>
													<div class="col-sm-5">
													</div>
												</div>

												<!-- 9.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">NKTP & NKK</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  name="nktp" onkeypress="input_number(event)">
													</div>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  name="nkk" onkeypress="input_number(event)">
													</div>
												</div>

												<!-- FORM DETAIL PENDIDIKAN.-------------------------------------------------------->
												<!-- 2.1.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Asal Sekolah</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname" value="<?php echo $key->sekolah ?>"  name="d_sekolah" readonly="">
													</div>
													<div class="col-sm-5">
													</div>
												</div>
												<!-- 2.2.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Alamat Sekolah</label>
													<div class="col-sm-5">
														<textarea class="form-control ta-dead" name="d_alamat"></textarea>
													</div>
													<div class="col-sm-5">
													</div>
												</div>
												<!-- 2.3.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Jurusan</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  name="d_jurusan" onkeypress="input_char(event)">
													</div>
													<div class="col-sm-5">
													</div>
												</div>
												<!-- 2.4.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Nomor Ijazah</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  name="d_noijazah" onkeypress="input_number(event)">
													</div>
													<div class="col-sm-5">
													</div>
												</div>
												<!-- 2.5.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Tanggal Ijazah</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="date" class="form-control" id="lname"  name="d_tglijazah">
													</div>
													<div class="col-sm-5">
													</div>
												</div>
												<!-- FORM STATUS BEKERJA.-------------------------------------------------------->
												<!-- 3.1.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Status Bekerja</label>
													<div class="col-sm-5">
														<select name="sbkerja" class="form-control" id="dropdownList">
															<option value="null">-Pilih-</option>
															<option value="bekerja">Bekerja</option>
															<option value="tidak-bekerja">Tidak Bekerja</option>
														</select>
													</div>
													<div class="col-sm-5">
													</div>
												</div>
												<!-- 3.2.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama Perusahaan</label>
													<div class="col-sm-5">
														<input autocomplete="off" type="text" class="form-control sb1" id="lname"  name="sbnama_perusahaan" onkeypress="input_char(event)">
													</div>
													<div class="col-sm-5">
														<span class="tpi">*data tidak perlu diisi</span>
													</div>
												</div>
												<!-- 3.3.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Instansi Tempat Bekerja</label>
													<div class="col-sm-5">
														<input autocomplete="off" type="text" class="form-control sb2" id="lname"  name="sbinstansi" onkeypress="input_char(event)">
													</div>
													<div class="col-sm-5">
														<span class="tpi">*data tidak perlu diisi</span>
													</div>
												</div>
												<!-- 3.4.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Jabatan</label>
													<div class="col-sm-5">
														<input autocomplete="off" type="text" class="form-control sb3" id="lname"  name="sbjabatan" >
													</div>
													<div class="col-sm-5">
														<span class="tpi">*data tidak perlu diisi</span>
													</div>
												</div>
												<!-- 3.5.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Alamat Kantor</label>
													<div class="col-sm-5">
														<textarea class="form-control ta-dead sb4" name="sbalamat_kantor"></textarea>
													</div>
													<div class="col-sm-5">
														<span class="tpi">*data tidak perlu diisi</span>
													</div>
												</div>
												<!-- FORM DETAIL ORTU.-------------------------------------------------------->
												<!-- 4.1.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama Lengkap Ibu</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  name="nama_ibu" onkeypress="input_char(event)">
													</div>
													<div class="col-sm-5">
													</div>
												</div>
												<!-- 4.2.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Pekerjaan Ibu</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  name="p_ibu" onkeypress="input_char(event)">
													</div>
													<div class="col-sm-5">
													</div>
												</div>
												<!-- 4.3.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama Lengkap Ayah</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  name="nama_ayah" onkeypress="input_char(event)">
													</div>
													<div class="col-sm-5">
													</div>
												</div>
												<!-- 4.4.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Pekerjaan Ayah</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  name="p_ayah" onkeypress="input_char(event)">
													</div>
													<div class="col-sm-5">
													</div>
												</div>
												<!-- 4.5.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama Perusahaan</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  name="nama_perusahaan" onkeypress="input_char(event)">
													</div>
													<div class="col-sm-5">
													</div>
												</div>
												<!-- 4.6.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Jabatan</label>
													<div class="col-sm-5">
														<input required="" autocomplete="off" type="text" class="form-control" id="lname"  name="jabatan" onkeypress="input_char(event)">
													</div>
													<div class="col-sm-5">
													</div>
												</div>
												<!-- 4.7.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Alamat Kantor</label>
													<div class="col-sm-5">
														<textarea class="form-control ta-dead" name="alamat_kantor"></textarea>
													</div>
													<div class="col-sm-5">
													</div>
												</div>
												<!-- OTHER.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Program Studi Pilihan</label>
													<div class="col-sm-5">
														<select name="id_studi_pilihan" class="form-control">
															<option value="null">-Pilih-</option>
															<?php 
															foreach ($studi_pilihan as $key4) {
																?>
																<option value="<?php echo $key4->id_studi_pilihan ?>"><?php echo $key4->studi_pilihan ?></option>
																<?php
															}
															?>
														</select>
													</div>
													<div class="col-sm-5">
													</div>
												</div>

												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Kelas Pilihan</label>
													<div class="col-sm-5">
														<select name="id_kelas_pilihan" class="form-control">
															<option value="null">-Pilih-</option>
															<?php 
															foreach ($kelas_pilihan as $key5) {
																?>
																<option value="<?php echo $key5->id_kelas_pilihan ?>"><?php echo $key5->kelas_pilihan ?></option>
																<?php
															}
															?>
														</select>
													</div>
													<div class="col-sm-5">
													</div>
												</div>
												<!-- foto.-------------------------------------------------------->
												<div class="h-5-px"></div>
												<div class="form-group row">
													<label for="lname" class="col-sm-2 text-right control-label col-form-label">Foto Data Diri</label>
													<div class="col-sm-5">
														<div class="f-data-diri" style="background: url('<?php echo base_url() ?>assets/img/user/<?php echo $this->session->userdata('foto'); ?>') no-repeat;">
														</div>
													</div>
													<div class="col-sm-5">
													</div>
												</div>

												<!-- footer.-------------------------------------------------------->
												<div class="h-15-px"></div>
												<div class="row">
													<div class="col-md-2"></div>
													<div class="col-md-10">
														<span style="color: #858585">*apabila terjadi kesalahan data pada form yang tidak dapat diubah harap melaporkan ke <a target="_blank" href="http://bit.ly/A-STKIP">Admin</a></span>
													</div>
												</div>
												<div class="h-15-px"></div>
												<div class="row">
													<div class="col-md-2"></div>
													<div class="col-md-10">
														<button type="submit" name="submit" class="btn btn-success" ><i class="fa fa-edit"></i>&nbsp;&nbsp;Submit</button>
														<button type="reset" class="btn btn-danger"><i class="fa fa-redo"></i>&nbsp;&nbsp;Reset</button>
													</div>
												</div>
												<div class="h-25-px"></div>
											</div>
										</form>
										<?php
									}
									?>
								</div>
							</div>
							<?php	
						}
						elseif ($key->id_status == '3') {
							?>
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
							<a href="<?php echo base_url() ?>data-registrasi">
								<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 objek">
									<div class="panel panel-default card-view pa-0 bgc-3">
										<div class="panel-wrapper collapse in">
											<div class="panel-body pa-0">
												<div class="sm-data-box">
													<div class="container-fluid">
														<div class="row">
															<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
																<span class="txt-light block counter">Registrasi</span>
																<span class="weight-500 uppercase-font block font-13 txt-light">Ulang</span>
															</div>
															<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
																<i class="fa fa-file data-right-rep-icon txt-light"></i>
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
						elseif ($key->id_status == '4') {
							?>
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
						}
					}
					?>
				</div>
			</div>
		</div>
		<!-- start to edit -->

		<!-- end of content -->
		<?php 
		$this->load->view('siswa/fitur/footer');
		$this->load->view('siswa/fitur/kaki');
		?>
		<script src="<?php echo base_url()?>vendor/jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".tpi").hide();
				$('#dropdownList').on('change',function(){
					var optionText = $("#dropdownList option:selected").text();
					// alert("Selected Option Text: "+optionText);
					var a = "Tidak Bekerja";
					if (optionText === a ) {
						$(".sb1").attr("disabled","disabled");
						$(".sb2").attr("disabled","disabled");
						$(".sb3").attr("disabled","disabled");
						$(".sb4").attr("disabled","disabled");
						$(".tpi").show();
					}else{
						$(".sb1").removeAttr("disabled","disabled");
						$(".sb2").removeAttr("disabled","disabled");
						$(".sb3").removeAttr("disabled","disabled");
						$(".sb4").removeAttr("disabled","disabled");
						$(".tpi").hide();
					}
				});
			});
		</script>
	</body>
	</html>