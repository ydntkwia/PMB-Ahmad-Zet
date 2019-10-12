<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="ThemeStarz">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">

<link rel="shortcut icon" href="<?php echo base_url()?>/assets/image/favicon.png">

<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/bootstrap2.min.css" type="text/css">
<link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/style3.css">
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/my.css">
<link rel="stylesheet" href="<?php echo base_url()?>/assets/js/sweetalert.css">
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/animate.css">
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/style4.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/configure.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/user-css.css">
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/owl.carousel.min.css">
<link href="<?php echo base_url()?>assets/css/disable-key.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/disable-key.js"></script>
<title>STIBA INVADA</title>

<style type="text/css">
	.dataTables_wrapper .dataTables_length{
		display: none;
	}
	.dataTables_wrapper .dataTables_filter {
		display: none;
	}
	.dataTables_wrapper .dataTables_info{
		display: none;
	}
	table.dataTable.no-footer{
		border: unset !important;
	}
	.table-responsive{
		overflow:hidden;
	}
	.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
		display: none;
	}
	.paginate_button.next#datable_1_next{
		display: none;
	}
	.paginate_button.previous#datable_1_previous{
		display: none;
	}
	.card{
		box-shadow: unset !important;
	}
	@media screen and (max-width: 767px){
		.dataTables_wrapper .dataTables_paginate {
			float: left !important;
		}
	}
</style>
<script>
	function input_number(evt)
	{
		var ch = String.fromCharCode(evt.which);
		if(!/[0-9]/.test(ch))
		{
			evt.preventDefault();
		}
	}
	function input_char(evt){
		var ch = String.fromCharCode(evt.which);
		var filter = /[a-zA-Z_ ]/   ;
		if(!filter.test(ch)){
			event.returnValue = false;
		}
	}
</script>