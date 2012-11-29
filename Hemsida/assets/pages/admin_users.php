<table class="table table-bordered">
<tr>
	<td><strong>ID</strong></td>
	<td><strong>Användarnamn</strong></td>
	<td><strong>Ändra</strong></td>
	<td><strong>Ta bort</strong></td>
</tr>
<?php
$query = "SELECT * FROM users WHERE rank = '1'"; 
$result = mysql_query($query) or die(mysql_error());

while($row = mysql_fetch_array($result)){
	?>
	<tr>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['username']; ?></td>
		<td><a class="btn" href="#">Ändra</a></td>
		<td><a class="btn" href="#">Ta bort</a></td>
	</tr>
	<?php
}
?>
</table>