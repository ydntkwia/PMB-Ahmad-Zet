</div>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>

<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

<script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/js/dataTables-data.js"></script>

<script src="<?php echo base_url()?>assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.counterup.min.js"></script>

<script src="<?php echo base_url()?>assets/js/init.js"></script>

<script type="text/javascript">

	windows.setTimeout("waktu()",1000);

	function waktu(){
		var tanggal= new Date();

		setTimeout("waktu()",1000);
		if (tanggal.getMinutes()<10) {
			var wow = ("0"+tanggal.getMinutes());
		}
		else {
			var wow = (tanggal.getMinutes());
		}
		if (tanggal.getSeconds()<10) {
			var wow2 = ("0"+tanggal.getSeconds());
		}
		else {
			var wow2 = (tanggal.getSeconds());
		}

		if (tanggal.getHours()<10) {
			var wow3 = ("0"+tanggal.getHours());
		}
		else {
			var wow3 = (tanggal.getHours());
		}
		document.getElementById("output").innerHTML=wow3+":"+ wow +":"+wow2;
	}

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