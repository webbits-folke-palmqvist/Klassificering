<?php include('_top.php'); ?>
<div class="hero-unit">
	<h2>Lägg till ett dokument</h2>
	<form action="?page=process&do=document">
		<input class="input-fill" type="text" name="title" placeholder="Titel"><br />
		<textarea name="body" placeholder="Din text"></textarea>
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
<?php include('_bottom.php'); ?>