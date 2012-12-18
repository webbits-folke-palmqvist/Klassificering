<?php
include('_top.php');
login();

$cat_id = secure($_GET['cat_id']);
$user_id = user_id($_SESSION['user']);

if($_GET['action'] == "view"){
	if(!$cat_id){
		header('location: ?page=Hem');
	}
	my_cat(secure($_GET['cat_id']));
	?>
	<div class="hero-unit">
		<ul class="breadcrumb">
			<li><a href="?page=Hem">Start</a> <span class="divider">/</span></li>
			<li class="active"><?php echo cat_name($cat_id); ?></li>
			<li class="pull-right"><?php if(rank() == 9){ ?><a class="btn" href="?page=Admin">Admin panel</a><?php } ?> <a class="btn btn-inverse" href="?page=Mitt-konto">Mitt konto</a> <a class="btn btn-danger" href="?page=Process&action=logout">Logga ut</a></li>
		</ul>
		<a class="btn btn-success" href="?page=Dokument&action=add&cat_id=<?php echo $cat_id; ?>">Lägg till ett dokument</a>
		<?php success(); ?>
		<div class="accordion" id="accordion2">
			<div class="accordion-group">
				<?php
				$result = mysql_query("SELECT * FROM document WHERE deleted = '0' AND user_id = '$user_id' AND category_id = '$cat_id' ORDER BY title");

				while($row = mysql_fetch_array($result)) {
					?>
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row['id']; ?>">
							<?php echo $row['title']; ?>
						</a>
					</div>
					<div id="<?php echo $row['id']; ?>" class="accordion-body collapse" style="height: 0px;">
						<div class="accordion-inner">
							<?php echo $row['content']; ?>
							<hr><a class="btn btn-info" href="?page=Dokument&action=edit&id=<?php echo $row['id'] ?>&cat_id=<?php echo secure($_GET['cat_id']); ?>">Ändra</a> <a class="btn btn-danger" href="?page=Process&action=document&do=delete&cat_id=<?php echo secure($_GET['cat_id']); ?>&id=<?php echo $row['id']; ?>">Radera</a>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<?php
}

if($_GET['action'] == "add"){
	?>
	<div class="hero-unit">
		<ul class="breadcrumb">
			<li><a href="?page=Hem">Start</a> <span class="divider">/</span></li>
			<li class="active">Ny kategori</li>
			<li class="pull-right"><?php if(rank() == 9){ ?><a class="btn" href="?page=Admin">Admin panel</a><?php } ?> <a class="btn btn-inverse" href="#">Mitt konto</a> <a class="btn btn-danger" href="?page=Process&action=logout">Logga ut</a></li>
		</ul>
		<h2>Lägg till en kategori</h2>
		<?php error(); ?>
		<form action="?page=Process&action=category&do=add" method="POST">
			<input class="input-fill" type="text" name="title" placeholder="Titel"><br />
		    <br>
			<a class="btn btn-danger" href="?page=Hem">Avbryt</a> <input class="btn btn-success" type="submit" value="Spara">
		</form>
	</div>
	<?php
}

include('_footer.php');
?>