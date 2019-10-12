<div class="card">
	<div class="container">
		<div class="h-20-px" ></div>
		<font class="red-7-font f-bold f-20-px">INFO TERKINI</font>
		<div class="w-50 h-2-px red-6-bg mt-1-px"></div>
		<?php 
		$i = 1;
		if ($artikel == NULL) {
			?>
			<div class="h-30-px"></div>
			<a class="grey-4-font" disabled=""><div class="mtn-5-px capitalize">Maaf, saat ini artikel tidak tersedia</div></a><br>
			<?php
		}
		else{
		foreach ($artikel as $key) {
			$str=$key->judul;
			if (strlen($str) > 20)
			{
				$str = substr($str, 0, 40);
				$str = explode(' ', $str);
				array_pop($str);
				$str = implode(' ', $str);
			}
			else{

			}
			?>
			<div class="h-20-px"></div>
			<div class="row">
				<div class="col-md-4">
					<a href="<?php echo base_url() ?>artikel/<?php echo $key->judul ?>">
						<div class="merah-bg h-74-px" data-bg-image="<?php echo base_url() ?>/assets/img/artikel/<?php echo $key->gambar ?>" >
						</div>
					</a>
				</div>
				<div class="col-md-8">
					<a href="<?php echo base_url() ?>artikel/<?php echo $key->judul ?>" class="grey-7-font f-up fw-7" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="feature-1" >
						<?php echo $str ?>
					</a>
				</div>

			</div>
			<div class="h-10-px"></div>
			<div class="grey-2-bg h-1-px w-100"></div>
			<?php
			if ($i++ == 3) break;} }
			?>
			<div class="h-20-px"></div>
			<div class="text-right"><a href="<?php echo base_url() ?>berita" class="btn btn-danger f-13-px p-berita-l">Lihat Lainnya&nbsp <i class="fa fa-chevron-right f-12-px"></i></a></div>
			<div class="h-20-px"></div>
		</div>
	</div>

