<?php
include('_top.php');
login();
if(!$_GET['cat_id']){
	header('location: ?page=Hem');
}

$cat_id = secure($_GET['cat_id']);
$user_id = user_id($_SESSION['user']);
?>
<div class="hero-unit">
	<ul class="breadcrumb">
		<li>Start <span class="divider">/</span></li>
		<li class="pull-right"><?php if(rank() == 9){ ?><a class="btn" href="?page=Admin">Admin panel</a><?php } ?> <a class="btn btn-inverse" href="#">Mitt konto</a> <a class="btn btn-danger" href="?page=Process&action=logout">Logga ut</a></li>
	</ul>
	<a class="btn btn-success" href="?page=Dokument&do=add&cat_id=<?php echo $cat_id; ?>">Lägg till ett dokument</a>
	<br /><br />
	<div class="accordion" id="accordion2">
		<div class="accordion-group">
			<?php
			$result = mysql_query("SELECT * FROM document WHERE deleted = '0' AND user_id = '$user_id' AND category_id = '$cat_id'");

			while($row = mysql_fetch_array($result)) {
				?>
				<div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#1">
						<?php echo $row['title']; ?>
					</a>
				</div>
				<div id="1" class="accordion-body collapse" style="height: 0px;">
					<div class="accordion-inner">
						<?php echo $row['content']; ?>
						<hr><a class="btn btn-info" href="#">Ändra</a> <a class="btn btn-danger" href="#">Radera</a>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
<?php include('_bottom.php'); ?>