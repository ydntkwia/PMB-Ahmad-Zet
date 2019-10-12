<!doctype html>
<html lang="en">
<head>
	<?php 
	$this->load->view('Index/fitur/head');
	?>
	
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
								<font class="red-7-font f-bold f-20-px f-up">Info Pendaftaran</font>
								<div class="w-20 h-2-px red-6-bg mt-2-px"></div>
								<div class="h-20-px mt-30-px"></div>
								<center>
									<img src="<?php echo base_url() ?>/assets/svg/info.svg" class="w-40 svg-daftar">
								</center>
								
								<div class="row ml-10-px mr-10-px mt-30-px info-mobile">
									<div class="col-md-12 col-xs-12">
										<div class="h-20-px"></div>

										<center>
											<div class="grey-2-bg h-1-px w-90"></div>
										</center>
										<div class="h-30-px"></div>

										<h5 class="fw-6 grey-7-font f-17-px f-center">Syarat Pendaftaran Calon Mahasiswa S1 Reguler dan Karyawan </h5>
										<ol class="grey-6-font f-12-px">
											<li>Lulusan SMA/SMK/MA semua Jurusan</li>
											<li>Mengisi Formulir Pendaftaran</li>
											<li>Menyerahkan Foto copy Ijazah yang sudah dilegalisir 2 lembar</li>
											<li>Fotocopy KTP 2 lbr</li>
											<li>Fotocopy Kartu Keluarga 2 lbr</li>
											<li>Pasfoto 2 x 3 dan 3 x 4 background warna Biru</li>
										</ol>
										<div class="h-20-px"></div>

										<center>
											<div class="grey-2-bg h-1-px w-90"></div>
										</center>						

										<div class="h-30-px"></div>
										<h5 class="fw-6 grey-7-font f-17-px	f-center">Syarat Pendaftaran Calon Mahasiswa S1 Alih Jalur </h5>
										<ol class="grey-6-font f-12-px">
											<li>Berasal dari Program Studi yang sudah terakreditasi minimal C</li>
											<li>Mengisi Formulir Pendaftaran</li>
											<li>Menyerahkan Surat Pengantar dari Perguruan Tinggi Asal</li>
											<li>Menyerahkan Surat Keterangan Mutasi dari kampus</li>
											<li>Terdaftar di EPSBED/PDPT</li>
											<li>Menyerahkan Fotocopy KTM</li>
											<li>Menyerahkan Foto copy transkip nilai perguruan tinggi asal</li>
											<li>Menyerahkan Foto copy Ijazah SMA yang sudah dilegalisir 2 lembar</li>
											<li>Fotocopy KTP 2 lbr</li>
											<li>Fotocopy Kartu Keluarga 2 lbr</li>
											<li>Pasfoto 2 x 3 dan 3 x 4 background warna Biru</li>
										</ol>
										<div class="h-20-px"></div>

										<center>
											<div class="grey-2-bg h-1-px w-90"></div>
										</center>						

										<div class="h-30-px"></div>
										<h5 class="fw-6 grey-7-font f-17-px	f-center">Waktu Pendaftaran & Jam Kerja </h5>
										<ol class="grey-6-font f-12-px">
											<li>01 November 2018 s.d 30 Agustus 2019</li>
											<li>Senin-Sabtu pukul 08.00 WIB s.d 16.00 WIB</li>
										</ol>
										<div class="h-20-px"></div>

										<center>
											<div class="grey-2-bg h-1-px w-90"></div>
										</center>						

										<div class="h-30-px"></div>
										<h5 class="fw-6 grey-7-font f-17-px	f-center">Alur Pendaftaran </h5>
										<center>
											<span class="grey-6-font f-15-px">*Klik gambar untuk mengunduh</span>
											<div class="h-20-px"></div>
											<a href="<?php echo base_url() ?>/assets/image/info pendaftaran.png" download><img src="<?php echo base_url() ?>/assets/image/info pendaftaran.png" class="w-90" ></a>
										</center>
									</div>
								</div>
								<div class="h-30-px" ></div>
							</div>
						</div>
					</div>

					<!-- berita -->
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

		$(".kedua").addClass("active");
		$(".pertama").removeClass("active");
        $('#penanda').addClass("in");
		
	</script>
	</html>

