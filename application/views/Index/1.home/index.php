<!doctype html>
<html lang="en">
<head>
	<?php 
	$this->load->view('Index/fitur/head');
	?>
	<style type="text/css">
		.berita-home{
			height: 300px !important;
			margin: -20px !important;
			background-size: cover !important;
		}
		.red-11{
			color: #d65050;
		}
	</style>
</head>
<body data-spy="scroll" data-target=".navbar" class="has-loading-screen">
	<?php 
	$this->load->view('Index/fitur/navbar');
	?>

	<!------------------------------------------------------------------------------------------------------------------------------------------------->

	<header id="ts-hero" class="ts-full-screen" data-bg-parallax="scroll" data-bg-parallax-speed="3">      
		<div class="container align-self-center">
			<div class="row align-items-center">
				<div class="col-sm-7">
					<h2 class="ts-opacity__80 fw-8">Selamat Datang!</h2>
					<h1 class="fw-6 Poppins" >Calon mahasiswa baru STIBA INVADA</h1>
					<a href="#how-it-works" class="btn btn-warning btn-lg ts-scroll white-font">Info Pendaftaran</a>
				</div>
			</div>
		</div>
		<div class="ts-background" data-bg-image-opacity=".6" data-bg-parallax="scroll" data-bg-parallax-speed="1" >
			<div class="ts-svg ts-z-index__2">
				<img src="<?php echo base_url()?>/assets/svg/wave-static-02.svg" class="w-100 position-absolute ts-bottom__0">
				<img src="<?php echo base_url()?>/assets/svg/wave-static-01.svg" class="w-100 position-absolute ts-bottom__0">
			</div>
			<div class="owl-carousel ts-hero-slider" data-owl-loop="1">
				<div class="ts-background-image ts-parallax-element" data-bg-color="rgba(0,0,0,0.0)" data-bg-image="<?php echo base_url() ?>/assets/image/bg-girl-3.jpg" data-bg-blend-mode="multiply"></div>
				<div class="ts-background-image ts-parallax-element" data-bg-color="rgba(0,0,0,0.0)" data-bg-image="<?php echo base_url() ?>/assets/image/bg-girl-1.jpg" data-bg-blend-mode="multiply"></div>
				<div class="ts-background-image ts-parallax-element" data-bg-color="rgba(0,0,0,0.0)" data-bg-image="<?php echo base_url() ?>/assets/image/bg-girl-2.jpg" data-bg-blend-mode="multiply"></div>
			</div>
		</div>
	</header>
	<main id="ts-content">
		<section id="how-it-works" class="ts-block text-center samping-atas-10">
			<div class="container">
				<div class="ts-title">
					<h2 class="fw-8" data-animate="ts-fadeInUp">INFO PENDAFTARAN</h2>
				</div>
				<div class="row">
					<div class="col-sm-6 col-md-4 col-xl-4">
						<figure data-animate="ts-fadeInUp">
							<figure class="icon mb-5 p-2">
								<img src="<?php echo base_url()?>/assets/image/1.png" alt="" width="60%" height="60%">
								<div class="ts-svg" data-animate="ts-zoomInShort" data-bg-image="assets/svg/organic-shape-01.png"></div>
							</figure>
							<h4>Jadwal Pendaftaran</h4>
							<p>
								Morbi et nisl a sapien malesuada scelerisque. Suspendisse tempor turpis mattis
							</p>
						</figure>
					</div>
					<div class="col-sm-6 col-md-4 col-xl-4">
						<figure data-animate="ts-fadeInUp" data-delay="0.1s">
							<figure class="icon mb-5 p-2">
								<img src="<?php echo base_url()?>/assets/image/2.png" alt="" width="60%" height="60%">
								<div class="ts-svg" data-animate="ts-zoomInShort" data-bg-image="assets/svg/organic-shape-02.png"></div>
							</figure>
							<h4>Prosedur Pendaftaran</h4>
							<p>
								Curabitur tellus enim, aliquet et porttitor id, accumsan at nulla. Praesent vestibulum
							</p>
						</figure>
					</div>
					<div class="col-sm-6 offset-sm-4 col-md-4 offset-md-0 col-xl-4">
						<figure data-animate="ts-fadeInUp" data-delay="0.2s">
							<figure class="icon mb-5 p-2">
								<img src="<?php echo base_url()?>/assets/image/3.png" alt="" width="60%" height="60%">
								<div class="ts-svg" data-animate="ts-zoomInShort" data-bg-image="assets/svg/organic-shape-03.png"></div>
							</figure>
							<h4>Syarat Umum & Khusus</h4>
							<p>
								In non turpis convallis nunc fermentum porttitor sed quis sapien. Etiam et neque
							</p>
						</figure>
					</div>
				</div>
			</div>
		</section>
		<div class="col-md-12 col-xs-12 partner-home">
			<center>
				<h2 class="fw-8" data-animate="ts-fadeInUp">MEDIA PARTNER KAMI</h2>
			</center>
		</div>
		<section id="partners" class="py-5 ts-block" data-bg-color="#f6f6f6">
			<div class="container">
				<div class="d-block d-md-flex justify-content-between align-items-center text-center ts-partners ">
					<a >
						<img src="<?php echo base_url()?>/assets/image/sponsor/12.png" alt="" class="w-80 h-80">
					</a>
					<a >
						<img src="<?php echo base_url()?>/assets/image/sponsor/13.png" alt="" class="w-80 h-80">
					</a>
					<a >
						<img src="<?php echo base_url()?>/assets/image/sponsor/14.png" alt="" class="w-80 h-80">
					</a>
					<a >
						<img src="<?php echo base_url()?>/assets/image/sponsor/15.png" alt="" class="w-80 h-80">
					</a>
					<a >
						<img src="<?php echo base_url()?>/assets/image/sponsor/16.png" alt="" class="w-80 h-80">
					</a>
				</div>
			</div>
		</section>
		<section id="how-it-looks" class="pb-0 ts-block text-center ts-overflow__hidden ts-shape-mask__down gambar2" data-bg-color="#000" data-bg-repeat="no-repeat" data-bg-position="bottom" style="background-size: cover;" data-bg-image="assets/image/4.jpg">
				<div class="container">
					<div class="mtn-13 tab-content pt-5 ts-tabs-presentation" id="myTabContent" data-animate="ts-fadeInUp">
						<div class="tab-pane fade show active" id="desktop" role="tabpanel" aria-labelledby="desktop">
							<img src="<?php echo base_url()?>/assets/img/img-desktop.png" class="mw-100 gambar1" alt="">
						</div>
					</div>
				</div>
			</section>
			<section id="what-is-appstorm" class="ts-block">
				<div class="container">
					<div class="ts-title">
						<h2 class="fw-8 mbn-20-px" data-animate="ts-fadeInUp" >MENGAPA HARUS MEMILIH<br> STIBA INVADA?</h2>
					</div>
					<div class="row">
						<div class="col-md-5 col-xl-5" data-animate="ts-fadeInUp" data-offset="100">
							<p>
								STIBA INVADA merupakan Sekolah Tinggi Ilmu Bahasa Asing dengan program studi Bahasa Inggris dan Bahasa Jepang yang berbasisi Ilmu Komputer. dalam Pembelajarannya, STIBA INVADA memadukan Teknologi Informasi seperti Office, Desain Grafis, Multimedia, Desain Web, dan E-Commerce . Selain itu STIBA INVADA juga memberikan skill kewirausahaan berbasisi digital marketing sehingga mahasiswa dapat bersaing mengadapi era digital saat ini.
							</p>
						</div>
						<div class="col-md-7 col-xl-7 text-center mt-30-px" data-animate="ts-fadeInUp" data-delay="0.1s" data-offset="100">
							<div class="px-3">
								<img src="<?php echo base_url()?>/assets/image/2.jpg" class="mw-100  ts-border-radius__md todo" id="ph" alt="">
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="features" class="ts-block" data-bg-image="assets/image/3.jpg" data-bg-size="inherit" data-bg-position="left" data-bg-repeat="no-repeat">
				<div class="container">
					<div class="row">
						<div class="col-md-7 col-xl-7 text-center">
							<div class="gambar3">
								<div class="position-relative">
									<figure class="gambar3 position-absolute text-center w-100 ts-z-index__1" data-animate="ts-zoomInShort">
										<img src="<?php echo base_url()?>/assets/image/5.jpg" class="mw-100 d-inline-block ts-shadow__lg  big" alt="">
									</figure>
									<figure class="gambar3 p-5" data-animate="ts-zoomInShort" data-delay="0.1s">
										<img src="<?php echo base_url()?>/assets/image/4.jpg" class="mw-100 ts-shadow__lg  big" alt="">
									</figure>
									<figure class="gambar3 position-absolute ts-bottom__0 ts-left__0 ts-z-index__2" data-animate="ts-zoomInShort" data-delay="0.2s">
										<img src="<?php echo base_url()?>/assets/image/6.jpg" class="mw-100 d-inline-block ts-shadow__lg big" alt="">
									</figure>
								</div>
							</div>
						</div>
						<div class="col-md-5 col-xl-5" data-animate="ts-fadeInUp" data-offset="100">
							<div class="ts-title">
								<h2 class="fw-8" class="paragraf2">SIAP DAFTAR?</h2>
							</div>
							<p class="paragraf white-bg pb-10-px pt-10-px pl-10-px pr-10-px" style="border-radius: 10px">
								Vivamus fermentum magna non faucibus dignissim. Sed a venenatis mi, vel tempus neque.
								Fusce pharetra, diam in hendrerit facilisis, enim diam cursus augue.
							</p>
							<a href="<?php echo base_url() ?>daftar" class="btn btn-primary mb-4 ts-scroll">Daftar</a>
						</div>
					</div>
				</div>
			</section>
			<section id="our-clients" class="ts-block text-center">
				<div class="container">
					<div class="ts-title">
						<h2 class="fw-8" data-animate="ts-fadeInUp">APA KATA MEREKA?</h2>
					</div>
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<div class="owl-carousel ts-carousel-blockquote" data-owl-dots="1" data-animate="ts-zoomInShort">
								<blockquote class="blockquote">
									<figure>
										<aside>
											<i class="fa fa-quote-right"></i>
										</aside>
										<div class="ts-circle__lg" data-bg-image="assets/image/avatar-02.jpg"></div>
									</figure>
									<p>
										Morbi et nisl a sapien malesuada scelerisque. Suspendisse tempor turpis mattis nibh posuere. Aenean sagittis nisl.
										uthicula sagitti
									</p>
									<footer class="blockquote-footer">
										<h4 class="f-up fw-8 red-7-font">Lorem Ipsum</h4>
										<h6 class="fw-6 red-5-font">Mahasiswa Fakultas Hukum</h6>
									</footer>
								</blockquote>

								<blockquote class="blockquote">
									<figure>
										<aside>
											<i class="fa fa-quote-right"></i>
										</aside>
										<div class="ts-circle__lg" data-bg-image="assets/image/avatar-03.jpg"></div>
									</figure>
									<p>
										Morbi et nisl a sapien malesuada scelerisque. Suspendisse tempor turpis mattis nibh posuere. Aenean sagittis nisl.
										uthicula sagitti
									</p>
									<footer class="blockquote-footer">
										<h4 class="f-up fw-8 red-7-font">Lorem Ipsum</h4>
										<h6 class="fw-6 red-5-font">Mahasiswa Fakultas Teknik</h6>
									</footer>
								</blockquote>

								<blockquote class="blockquote">
									<figure>
										<aside>
											<i class="fa fa-quote-right"></i>
										</aside>
										<div class="ts-circle__lg" data-bg-image="assets/image/avatar-01.jpg"></div>
									</figure>
									<p>
										Morbi et nisl a sapien malesuada scelerisque. Suspendisse tempor turpis mattis nibh posuere. Aenean sagittis nisl.
										uthicula sagitti
									</p>
									<footer class="blockquote-footer">
										<h4 class="f-up fw-8 red-7-font">Lorem Ipsum</h4>
										<h6 class="fw-6 red-5-font">Mahasiswa Fakultas Hukum</h6>
									</footer>
								</blockquote>

							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<section id="Berita" class="ts-block text-center mtn-100-px">
			<div class="container">
				<div class="ts-title">
					<h2  data-animate="ts-fadeInUp" class="fw-8">INFO LAINNYA</h2>
				</div>
				<div class="row">
					<?php
					$i = 1;
					if ($artikel == NULL) {
						?>
						<div class="col-12">
							<center>
								<img src="<?php echo base_url() ?>assets/svg/empty.svg" class="w-35"><br>
								<p class="mt-25-px f-25-px">Maaf, saat ini Artikel tidak tersedia.</p>
							</center>
						</div>
						<?php
					}
					else{
						foreach ($artikel as $key) {
							?>
							<div class="col-sm-6 col-md-4 col-xl-4 kartu c-berita" style="padding:40px;">
								<a href="<?php echo base_url() ?>artikel/<?php echo $key->judul ?>">
									<figure data-animate="ts-fadeInUp">
										<div style="background:url('<?php echo base_url()?>/assets/img/artikel/<?php echo $key->gambar ?>');" class="berita-home">
										</div>
										<div class="h-50-px"></div>
										<h4 class="f-18-px f-left f-up fw-6 red-11" ><?php echo $key->judul ?></h4>
										<span class="grey-5-font">
											<?php
											$str=$key->isi;
											if (strlen($str) > 100)
											{
												$str = substr($str, 0, 200);
												$str = explode(' ', $str);
												array_pop($str);
												$str = implode(' ', $str);
											}
											echo (htmlspecialchars_decode($str)."...");
											?>
										</span>
									</figure>
								</a>
							</div>
							<?php 
							if ($i++ == 3) break;}
						} ?>
					</div>
					<center>
						<div class="h-50-px"></div>
						<button class="btn btn-danger b-berita" onclick="window.location.href='<?php echo base_url() ?>berita'">Lihat selengkapnya &nbsp<i class="fa fa-chevron-right"></i></button>
					</center>
				</div>
			</section>

			<!------------------------------------------------------------------------------------------------------------------------------------------------->

			<?php
			$this->load->view('Index/fitur/footer');
			?>
			</html>
