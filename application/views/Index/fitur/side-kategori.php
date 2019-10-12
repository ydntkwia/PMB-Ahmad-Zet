<style type="text/css">
	.capitalize{
		text-transform: capitalize;
	}
</style>
<div class="card">
	<div class="container">
		<div class="h-20-px" ></div>
		<font class="red-7-font f-bold f-20-px f-up">Kategori Berita	</font>
		<div class="w-60 h-2-px red-6-bg mt-1-px"></div>
		<div class="h-30-px"></div>
		<?php
		$i = 1;
		if ($kategori == NULL) 
		{
			?>
			<a class="grey-4-font" disabled=""><div class="mtn-5-px capitalize">Maaf, saat ini kategori artikel tidak tersedia</div></a><br>
			<?php
		}else{
			foreach ($kategori as $key): ?>
				<a class="grey-4-font" href="<?php echo base_url() ?>kategori/<?php echo $key->kategori ?>"><div class="mtn-5-px capitalize"><?php echo $key->kategori ?></div></a><br>
			<?php endforeach; } ?>
			<div class="h-20-px"></div>
		</div>
	</div>