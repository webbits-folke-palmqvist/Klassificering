<?php success(); ?>
<table class="table table-bordered">
	<tr>
		<td><strong>ID</strong></td>
		<td><strong>Användarnamn</strong></td>
		<td><strong>Dokument</strong></td>
		<td><strong>Kategori</strong></td>
		<td><strong>Ta bort</strong></td>
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

	$jump = $page * 10;

	$query = "SELECT * FROM users WHERE rank = '1' AND deleted = 0 ORDER BY id DESC LIMIT $jump,10"; 
	$result = mysql_query($query) or die(mysql_error());

	while($row = mysql_fetch_array($result)){
		?>
		<tr>
			<td style="width: 1%;"><?php echo $row['id']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td style="width: 10%;"><?php count_rows_user("document", $row['id']); ?> st</td>
			<td style="width: 10%;"><?php count_rows_user("category", $row['id']); ?> st</td>
			<td style="width: 10%;"><a class="btn" href="?page=Process&action=admin&do=DeleteUser&UserID=<?php echo $row['id']; ?>">Ta bort</a></td>
		</tr>
		<?php
	}
	?>
</table>
<?php if($page != 0){ ?><a class="btn pull-left" href="?page=Admin&sub=users&p=<?php echo $page_back; ?>">Föregånde</a><?php } ?>
<?php if((count_rows_return("users") - $jump) > $jump){ ?><a class="btn pull-right" href="?page=Admin&sub=users&p=<?php echo $page_next; ?>">Nästa</a><?php } ?>
<br>