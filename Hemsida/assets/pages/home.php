<?php
include('_top.php');
login();

$user_id = user_id($_SESSION['user']);
?>
<div class="hero-unit">
	<ul class="breadcrumb">
		<li class="active">Start</li>
		<li class="pull-right"><?php if(rank() == 9){ ?><a class="btn" href="?page=Admin">Admin panel</a><?php } ?> <a class="btn btn-inverse" href="#">Mitt konto</a> <a class="btn btn-danger" href="?page=Process&action=logout">Logga ut</a></li>
	</ul>
	<a class="btn btn-success" href="#">Lägg till en kategori</a>
	<br /><br />
	<?php
	$result = mysql_query("SELECT * FROM category WHERE deleted = '0' AND user_id = '$user_id' ORDER BY name");

	while ($row = mysql_fetch_array($result)) {
		?>
		<p><a href="?page=Kategori&cat_id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></p>
		<?php
	}
	?>
</div>
<?php include('_bottom.php'); ?>