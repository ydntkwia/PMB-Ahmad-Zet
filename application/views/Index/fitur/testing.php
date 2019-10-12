<!doctype html>
<html lang="en">
<head>
	<?php 
	$this->load->view('Index/fitur/head');
	?>
	
</head>
<body data-spy="scroll" data-target=".navbar .in" class="has-loading-screen" >
	<?php  
	if ($this->session->flashdata('testing') != '' ) 
	{ 
		?>
		<div class="alert red-7-bg alert-dismissible show" role="alert">
			<strong class="white-font">Alert!<?php echo $this->session->flashdata('testing');?></strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="alert blue-7-bg alert-dismissible show" role="alert">
			<strong class="white-font">Apakah Anda Tetap ingin menghapusya?</strong> 
			<button type="" class="btn red-5-bg white-font" onclick="window.location.href='<?php echo base_url() ?>Index/hapus_paksa/<?php echo $this->session->flashdata('id_testing'); ?>'">Ya</button>
			<button type="" class="btn green-5-bg white-font" onclick="window.location.href='<?php echo base_url() ?>Index/testing'">Tidak</button>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
	}
	?>
	<table border="1">
		<tr>
			<td>id_artikel</td>
			<td>id_kategori</td>
		</tr>
		<?php 
		foreach ($artikel as $key) {
			?>
			<tr>
				<td><?php echo $key->id_artikel ?></td>
				<td><?php echo $key->id_kategori ?></td>
			</tr>
			<?php
		}
		?>
	</table>
	<table border="1">
		<tr>
			<td>id_kategori</td>
			<td>kategori</td>
		</tr>
		<?php 
		foreach ($kategori as $key) {
			?>
			<tr>
				<td><?php echo $key->id_kategori ?></td>
				<td><?php echo $key->kategori ?></td>
				<td><a class=" btn btn-info" style="color: white" data-toggle="modal" data-target="#delete<?php echo $key->id_kategori?>"><i class="fa fa-trash"></i></a></td>
				<!-- modal delete -->
				<div class="modal animated fadeInDown" style="animation-duration: 0.5s" id="delete<?php echo $key->id_kategori?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-body pt-35-px pb-35-px">
								<center>
									<span class="f-20-px">Hapus Artikel?</span>
									<span><?php echo $key->id_kategori ?></span>
								</center>
							</div>
							<div class="modal-footer">
								<center>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url() ?>Index/testing_delete/<?php echo $key->id_kategori ?>'">Delete</button>
								</center>
							</div>
						</div>
					</div>
				</div>

			</tr>
			<?php
		}
		?>
	</table>
	<div style="height: 1000px"></div>
</body>
<?php $this->load->view('Index/fitur/footer2');
?>
</html>

