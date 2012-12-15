<?php
include('_top.php');
login();

if(secure($_GET['action']) == "add"){
	?>
	<div class="hero-unit">
		<h2>Lägg till ett dokument</h2>
		<?php error(); ?>
		<form action="?page=Process&action=document&do=add" method="POST">
			<input class="input-fill" type="text" name="title" placeholder="Titel"><br />
			<textarea name="body"></textarea>
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
			<a class="btn btn-danger" href="?page=Hem">Avbryt</a> <input class="btn btn-success" type="submit" value="Spara">
		</form>
	</div>
	<?php
}

include('_bottom.php');
?>