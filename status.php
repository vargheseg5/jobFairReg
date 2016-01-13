<?php
	require_once('./connect.inc.php');
	$q = mysql_query("SELECT `short_name`, `available` FROM `companies`");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Company Slots Availability</title>
	<script type="text/javascript" src="./js/jquery-2.2.0.min.js"></script>
    <link href="./css/bootstrap.min.css"
    rel="stylesheet">
</head>
<body>
	<table id="dataTable" class="table table-striped table-bordered">
	</table>
	<script type="text/javascript">
		window.setInterval(function(){
			$.ajax('./tableUpdate.php')
				.done(function(data){
					$('#dataTable').html(data);
				});
		}, 1000);
	</script>
</body>
</html>