<table class="table table-bordered">
	<tr>
		<td><strong>ID</strong></td>
		<td><strong>Användarnamn</strong></td>
		<td><strong>Dokument</strong></td>
		<td><strong>Kategori</strong></td>
		<td><strong>Ta bort</strong></td>
	</tr>
	<?php
	$query = "SELECT * FROM users WHERE rank = '1' AND deleted = 0 ORDER BY id DESC"; 
	$result = mysql_query($query) or die(mysql_error());

	while($row = mysql_fetch_array($result)){
		$user_id = user_id($row['username']);
		?>
		<tr>
			<td style="width: 1%;"><?php echo $row['id']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td style="width: 10%;"><?php count_rows_user("document", $user_id); ?> st</td>
			<td style="width: 10%;"><?php count_rows_user("category", $user_id); ?> st</td>
			<td style="width: 10%;"><a class="btn" href="#">Ta bort</a></td>
		</tr>
		<?php
	}
	?>
</table>