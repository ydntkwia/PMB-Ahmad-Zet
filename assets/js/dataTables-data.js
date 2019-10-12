/*DataTable Init*/

"use strict"; 

$(document).ready(function() {
	"use strict";
	
	$('#datable_1').DataTable({
		"aLengthMenu": [[25, 50, 75, -1], [5, 10, 15, "All"]],
		"iDisplayLength": 5,
	});
	$('#datable_2').DataTable({
		"aLengthMenu": [[25, 50, 75, -1], [5, 10, 15, "All"]],
		"iDisplayLength": 5,
		"order": [[ 0, "desc" ]]
	});
} );

