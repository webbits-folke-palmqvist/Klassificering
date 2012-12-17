<?php
include('_top.php');
login();

$user_id = user_id($_SESSION['user']);
?>
<div class="hero-unit">
	<ul class="breadcrumb">
		<li class="active">Start</li>
		<li class="pull-right"><?php if(rank() == 9){ ?><a class="btn" href="?page=Admin">Admin panel</a><?php } ?> <a class="btn btn-inverse" href="?page=Mitt-konto">Mitt konto</a> <a class="btn btn-danger" href="?page=Process&action=logout">Logga ut</a></li>
	</ul>
	<a class="btn btn-success" href="?page=Kategori&action=add">Lägg till en kategori</a>
	<?php success(); ?>
	<table class="table table-hover">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE deleted = '0' AND user_id = '$user_id' ORDER BY name");

		while ($row = mysql_fetch_array($result)) {
			?>
			<tr>
				<td><a href="?page=Kategori&action=view&cat_id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
				<td style="width: 100px;"><a class="btn" href="?page=Process&action=category&do=delete&cat_id=<?php echo $row['id']; ?>"><i class="icon-remove"></i> Ta bort</a></td>
			</tr>
			<?php
		}
		?>
	</table>
</div>
<?php include('_bottom.php'); ?>