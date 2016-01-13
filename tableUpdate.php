<?php
	require_once('./connect.inc.php');
	$q = mysql_query("SELECT `short_name`, `available` FROM `companies`");
?>
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
		if($cnt <= 0)
			echo "		<tr class=\"danger\">";
		else if($cnt <= 10)
			echo "		<tr class=\"warning\">";
		else
			echo "		<tr>";

		$outval = <<<END
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