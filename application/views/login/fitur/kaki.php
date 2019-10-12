
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/main2.js"></script>
<script src="<?php echo base_url()?>assets/js/fingerprint2.js"></script>
<script type="text/javascript">
	var fingerprintReport = function () {
      Fingerprint2.get(function(components) {
        var murmur = Fingerprint2.x64hash128(components.map(function (pair) { return pair.value }).join(), 31)
        document.querySelector("#ap").value = murmur
      })
    }
    
    if (window.requestIdleCallback) {
      cancelId = requestIdleCallback(fingerprintReport)
      cancelFunction = cancelIdleCallback
    } else {
      cancelId = setTimeout(fingerprintReport, 500)
      cancelFunction = clearTimeout
    }    
    fingerprintReport();
    
	function input_number(evt)
	{
		var ch = String.fromCharCode(evt.which);
		if(!/[0-9]/.test(ch))
		{
			evt.preventDefault();
		}
	}
</script>