<?php success(); ?>
<table class="table table-bordered">
	<tr>
		<td><strong>ID</strong></td>
		<td><strong>Användarnamn</strong></td>
		<td><strong>Innehåll</strong></td>
		<td><strong>IP</strong></td>
		<td><strong>Datum</strong></td>
	</tr>
	<?php
	if(!secure($_GET['p'])){
		$page = 0;
		$page_next = 1;
		$page_back = 0; 
	} else {
		$page = secure($_GET['p']);
		$page_next = secure($_GET['p']) + 1;
		$page_back = secure($_GET['p']) - 1;
	}

	$amount = 10;
	$jump = $page * $amount;

	$query = "SELECT * FROM log ORDER BY id DESC LIMIT $jump,$amount"; 
	$result = mysql_query($query) or die(mysql_error());

	while($row = mysql_fetch_array($result)){
		?>
		<tr>
			<td style="width: 1%;"><?php echo $row['id']; ?></td>
			<td style="width: 20%;"><?php echo username($row['user_id']); ?></td>
			<td><?php echo $row['content']; ?></td>
			<td style="width: 15%;"><?php echo $row['ip']; ?></td>
			<td><?php echo date("H:i", $row['time']).", ".daten($row['time']); ?></td>
		</tr>
		<?php
	}
	?>
</table>
<?php if($page != 0){ ?><a class="btn pull-left" href="?page=Admin&sub=log&p=<?php echo $page_back; ?>">Föregånde</a><?php } ?>
<?php if((count_rows_log_return("log") - $amount) > $jump){ ?><a class="btn pull-right" href="?page=Admin&sub=log&p=<?php echo $page_next; ?>">Nästa</a><?php } ?>
<br>