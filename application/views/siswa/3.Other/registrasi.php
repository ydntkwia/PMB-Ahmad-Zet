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
	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row heading-bg">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h5 class="txt-dark mobile-judul">Cek Data Registrasi</h5>
				</div>
				<!-- Breadcrumb -->
				<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url() ?>user">Dashboard</a></li>
						<li><a class="active">Cek Data</a></li>
					</ol>
				</div>
				<!-- /Breadcrumb -->
			</div>
			<div class="row">
				<div class="col-12">
					<div class="panel panel-default card-view">
						<div class="table-wrap">
							<?php 
							foreach ($edit as $key) {
								?>
									<div class="card-body">
										<h4 class="card-title" style="opacity: 0">Nothing</h4>
										
										<!-- root:: -------------------------------------------------------->
										<div class="form-group row" style="display: none !important;">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">ID DAFTAR</label>
											<div class="col-sm-5">
												<input readonly required="" autocomplete="off" type="text" class="form-control" id="lname" name="id_daftar" value="<?php echo $key->id_daftar ?>" >
											</div>
											<div class="col-sm-5"></div>
										</div>

										<!-- 0.-------------------------------------------------------->
										<div class="form-group row" style="display: none !important; ">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">NIS</label>
											<div class="col-sm-5">
												<input readonly required="" autocomplete="off" type="text" class="form-control" id="lname" name="nis"  value="<?php echo $key->nis ?>" >
											</div>
											<div class="col-sm-5"></div>
										</div>

										<!-- 1.-------------------------------------------------------->
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama</label>
											<div class="col-sm-5">
												<input readonly required="" autocomplete="off" type="text" class="form-control" id="lname" name="nama" value="<?php echo $key->nama ?>" >
											</div>
											<div class="col-sm-5"></div>
										</div>
										
										<!-- 2.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Jenis Kelamin</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->jk ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="tempat_lahir" onkeypress="input_char(event)">
											</div>
											<div class="col-sm-5"></div>
										</div>
										
										<!-- 3.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Alamat</label>
											<div class="col-sm-5">
												<textarea readonly class="form-control ta-dead" name="alamat"><?php echo $key->alamat ?></textarea>
											</div>
											<div class="col-sm-5"></div>
										</div>

										<!-- 4.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Tempat/Tgl Lahir</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->tempat_lahir ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="tempat_lahir" onkeypress="input_char(event)">
											</div>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->tanggal_lahir ?>" required="" autocomplete="off" type="date" class="form-control" id="lname"  name="tanggal_lahir">
											</div>
										</div>

										<!-- 5.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Kewarganegaraan</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->kewarganegaraan ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="kewarganegaraan" onkeypress="input_char(event)">
											</div>
											<div class="col-sm-5">
											</div>
										</div>

										<!-- 6.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Nomor Telp</label>
											<div class="col-sm-5">
												<input readonly required="" autocomplete="off" type="text" class="form-control" value="<?php echo $key->telp ?>" id="lname"   onkeypress="input_number(event)" name="telp">
											</div>
											<div class="col-sm-5">
											</div>
										</div>

										<!-- 7.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Agama</label>
											<div class="col-sm-5">
												<input readonly required="" autocomplete="off" type="text" class="form-control" value="<?php echo $key->agama ?>" id="lname"   onkeypress="input_number(event)" name="telp">
											</div>
											<div class="col-sm-5">
											</div>
										</div>

										<!-- 8.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Status Marital</label>
											<div class="col-sm-5">
												<input readonly required="" autocomplete="off" type="text" class="form-control" value="<?php echo $key->marital ?>" id="lname"   onkeypress="input_number(event)" name="telp">
											</div>
											<div class="col-sm-5">
											</div>
										</div>

										<!-- 9.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">NKTP & NKK</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->nktp ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="nktp" onkeypress="input_number(event)">
											</div>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->nkk ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="nkk" onkeypress="input_number(event)">
											</div>
										</div>

										<!-- FORM DETAIL PENDIDIKAN.-------------------------------------------------------->
										<!-- 2.1.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Asal Sekolah</label>
											<div class="col-sm-5">
												<input readonly required="" autocomplete="off" type="text" class="form-control" id="lname" value="<?php echo $key->sekolah ?>"  name="d_sekolah" >
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- 2.2.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Alamat Sekolah</label>
											<div class="col-sm-5">
												<textarea readonly class="form-control ta-dead" name="d_alamat"><?php echo $key->d_alamat ?></textarea>
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- 2.3.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Jurusan</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->d_jurusan ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="d_jurusan" onkeypress="input_char(event)">
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- 2.4.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Nomor Ijazah</label>
											<div class="col-sm-5">
												<input readonly  value="<?php echo $key->d_noijazah ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="d_noijazah" onkeypress="input_number(event)">
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- 2.5.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Tanggal Ijazah</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->d_tglijazah ?>"  required="" autocomplete="off" type="date" class="form-control" id="lname"  name="d_tglijazah">
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
												<input readonly value="<?php echo $key->sbkerja ?>"  required="" autocomplete="off" type="text" class="form-control" id="lname"  name="d_tglijazah">
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- 3.2.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama Perusahaan</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->sbnama_perusahaan ?>" autocomplete="off" type="text" class="form-control" id="lname"  name="sbnama_perusahaan" onkeypress="input_char(event)">
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- 3.3.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Instansi Tempat Bekerja</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->sbinstansi ?>" autocomplete="off" type="text" class="form-control" id="lname"  name="sbinstansi" onkeypress="input_char(event)">
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- 3.4.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Jabatan</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->sbjabatan ?>" autocomplete="off" type="text" class="form-control" id="lname"  name="sbjabatan" >
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- 3.5.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Alamat Kantor</label>
											<div class="col-sm-5">
												<textarea readonly class="form-control ta-dead" name="sbalamat_kantor"><?php echo $key->sbalamat_kantor ?></textarea>
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- FORM DETAIL ORTU.-------------------------------------------------------->
										<!-- 4.1.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama Lengkap Ibu</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->nama_ibu ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="nama_ibu" onkeypress="input_char(event)">
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- 4.2.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Pekerjaan Ibu</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->p_ibu ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="p_ibu" onkeypress="input_char(event)">
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- 4.3.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama Lengkap Ayah</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->nama_ayah ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="nama_ayah" onkeypress="input_char(event)">
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- 4.4.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Pekerjaan Ayah</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->p_ayah ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="p_ayah" onkeypress="input_char(event)">
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- 4.5.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Nama Perusahaan</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->nama_perusahaan ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="nama_perusahaan" onkeypress="input_char(event)">
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- 4.6.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Jabatan</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->jabatan ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="jabatan" onkeypress="input_char(event)">
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- 4.7.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Alamat Kantor</label>
											<div class="col-sm-5">
												<textarea readonly class="form-control ta-dead" name="alamat_kantor"><?php echo $key->alamat_kantor ?></textarea>
											</div>
											<div class="col-sm-5">
											</div>
										</div>
										<!-- OTHER.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Program Studi Pilihan</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->studi_pilihan ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="jabatan" onkeypress="input_char(event)">
											</div>
											<div class="col-sm-5">
											</div>
										</div>

										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Kelas Pilihan</label>
											<div class="col-sm-5">
												<input readonly value="<?php echo $key->kelas_pilihan ?>" required="" autocomplete="off" type="text" class="form-control" id="lname"  name="jabatan" onkeypress="input_char(event)">
											</div>
											<div class="col-sm-5">
											</div>
										</div>

										<!-- foto.-------------------------------------------------------->
										<div class="h-5-px"></div>
										<div class="form-group row">
											<label for="lname" class="col-sm-2 text-right control-label col-form-label">Foto Data Diri</label>
											<div class="col-sm-5">
												<div class="f-data-diri" style="background: url('<?php echo base_url() ?>assets/img/user/<?php echo $key->foto?>') no-repeat;">
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
												<button type="button" name="submit" class="btn btn-success" onclick="window.location.href='<?php echo base_url() ?>user'"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Kembali</button>
											</div>
										</div>
										<div class="h-25-px"></div>
									</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php 
	$this->load->view('siswa/fitur/footer');
	$this->load->view('siswa/fitur/kaki');
	?>
</body>
</html>