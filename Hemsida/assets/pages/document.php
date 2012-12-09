<?php
include('_top.php');
login();
?>
<div class="hero-unit">
	<h2>Lägg till ett dokument</h2>
	<form action="?page=Process&action=document">
		<input class="input-fill" type="text" name="title" placeholder="Titel"><br />
		<textarea name="body"></textarea>
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