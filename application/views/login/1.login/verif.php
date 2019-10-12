<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/fingerprint2.js"></script>
	<script type="text/javascript">
		var fingerprintReport = function () {
			Fingerprint2.get(function(components) {
				var murmur = Fingerprint2.x64hash128(components.map(function (pair) { return pair.value }).join(), 31)
				$(location).attr("hash","/"+murmur);
				var x = window.location.href;
				var y = x.replace("#", "");
				window.location.href=y;
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
	</script>
</body>
</html>