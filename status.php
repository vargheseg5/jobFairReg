<?php
	require_once('./connect.inc.php');
	$q = mysql_query("SELECT `short_name`, `available` FROM `companies`");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Company Slots Availability</title>
</head>
<body>
<table>
	<tr>
		<th>
			Company
		</th>
		<th>
			Slots
		</th>
	</tr>
<?php
	while ($row = mysql_fetch_array($q)) {
		$cn = $row[0];
		$cnt = $row[1];
		$outval = <<<END
	<tr>
		<td>
			$cn
		</td>
		<td>
			$cnt
		</td>
	</tr>\n
END;
		print($outval);
	}
?>
</body>
</html>