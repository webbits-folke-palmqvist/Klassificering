<?php
include('_top.php');
login();

if(secure($_GET['action']) == "add"){
	?>
	<div class="hero-unit">
		<ul class="breadcrumb">
			<li><a href="?page=Hem">Start</a> <span class="divider">/</span></li>
			<li><a href="?page=Kategori&action=view&cat_id=<?php echo secure($_GET['cat_id']); ?>"><?php echo cat_name(secure($_GET['cat_id'])); ?></a> <span class="divider">/</span></li>
			<li class="active">Nytt dokument</li>
			<li class="pull-right"><?php if(rank() == 9){ ?><a class="btn" href="?page=Admin">Admin panel</a><?php } ?> <a class="btn btn-inverse" href="?page=Mitt-konto">Mitt konto</a> <a class="btn btn-danger" href="?page=Process&action=logout">Logga ut</a></li>
		</ul>
		<h2>Lägg till ett dokument</h2>
		<?php error(); ?>
		<form action="?page=Process&action=document&do=add&cat_id=<?php echo secure($_GET['cat_id']); ?>" method="POST">
			<input class="input-fill" type="text" name="title" placeholder="Titel"><br />
			<textarea name="content"></textarea>
			<input type="hidden" name="cat_id" value="<?php echo $_GET['cat_id']; ?>">
			<script language="javascript" type="text/javascript" src="assets/tiny_mce/tiny_mce.js"></script>
		    <script language="javascript" type="text/javascript">
		    tinyMCE.init({
		            theme : "advanced",
		            mode : "textareas",
		            theme_advanced_toolbar_location : "top"
		    });
		    </script>
		    <br>
		    <?php success(); ?>
			<a class="btn btn-danger" href="?page=Kategori&action=view&cat_id=<?php echo secure($_GET['cat_id']); ?>">Avbryt</a> <input class="btn btn-success" type="submit" value="Spara">
		</form>
	</div>
	<?php
}

if(secure($_GET['action']) == "edit"){
	my_doc(secure($_GET['id']));
	?>
	<div class="hero-unit">
		<ul class="breadcrumb">
			<li><a href="?page=Hem">Start</a> <span class="divider">/</span></li>
			<li><a href="?page=Kategori&action=view&cat_id=<?php echo secure($_GET['cat_id']); ?>"><?php echo cat_name(secure($_GET['cat_id'])); ?></a> <span class="divider">/</span></li>
			<li class="active">Ändra</li>
			<li class="pull-right"><?php if(rank() == 9){ ?><a class="btn" href="?page=Admin">Admin panel</a><?php } ?> <a class="btn btn-inverse" href="#">Mitt konto</a> <a class="btn btn-danger" href="?page=Process&action=logout">Logga ut</a></li>
		</ul>
		<h2>Lägg till ett dokument</h2>
		<?php error(); ?>
		<?php
		$user = $_SESSION['user'];
		$user_id = user_id($user);
		$cat_id = secure($_GET['cat_id']);

		$result = mysql_query("SELECT * FROM document WHERE deleted = '0' AND user_id = '$user_id' AND category_id = '$cat_id' LIMIT 1");

		while($row = mysql_fetch_array($result)){
			?>
			<form action="?page=Process&action=document&do=edit&id=<?php echo $row['id']; ?>&cat_id=<?php echo secure($_GET['cat_id']); ?>" method="POST">
				<input class="input-fill" type="text" name="title" placeholder="Titel" value="<?php echo $row['title']; ?>"><br />
				<textarea name="content"><?php echo $row['content']; ?></textarea>
				<input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">
				<script language="javascript" type="text/javascript" src="assets/tiny_mce/tiny_mce.js"></script>
			    <script language="javascript" type="text/javascript">
			    tinyMCE.init({
			            theme : "advanced",
			            mode : "textareas",
			            theme_advanced_toolbar_location : "top"
			    });
			    </script>
			    <br>
			    <?php success(); ?>
				<a class="btn btn-danger" href="?page=Kategori&action=view&cat_id=<?php echo secure($_GET['cat_id']); ?>">Tillbaka</a> <?php if($row['share'] == 0){ ?><a class="btn btn-info" href="?page=Process&action=document&do=share&cat_id=<?php echo secure($_GET['cat_id']); ?>&id=<?php echo secure($_GET['id']); ?>">Dela detta dokument</a><?php } else { ?><a class="btn btn-info" href="?page=Process&action=document&do=stop_share&cat_id=<?php echo secure($_GET['cat_id']); ?>&id=<?php echo secure($_GET['id']); ?>">Sluta dela</a><?php } ?> <input class="btn btn-success" type="submit" value="Spara">
				<?php if($row['share'] != 0){ ?><br><br>Dokument länk: <input onClick="SelectAll('code');" id="code" type="text" value="http://localhost/OnlineNote/Hemsida/?page=Visa&code=<?php echo $row['share']; ?>"><?php } ?>
				<script type="text/javascript">
				function SelectAll(id)
					{
					    document.getElementById(id).focus();
					    document.getElementById(id).select();
					}
				</script>
			</form>
			<?php
		}
		?>
	</div>
	<?php
}

include('_footer.php');
?>