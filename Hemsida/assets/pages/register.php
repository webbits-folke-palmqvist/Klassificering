<?php include('_top.php'); ?>
<?php if($_SESSION['user']){header('location: ?page=Start');} ?>
<?php
if(GetSetting(4) == 1){
	?>
	<form class="form-signin" action="?page=Process&action=register" method="POST">
		<h2 class="form-signin-heading">Tack för du väljer oss</h2>
		<h5><?php error(); ?></h5>
		<input name="username" type="text" class="input-block-level" placeholder="Användarnamn">
		<input name="password" type="password" class="input-block-level" placeholder="Lösenord">
		<input name="password2" type="password" class="input-block-level" placeholder="Lösenordet igen">
		<button class="btn btn-large btn-success btn-block" type="submit">Registrera dig nu</button>
		<hr>
		<center><a href="?page=Logga-in">Tillbaka</a></center>
	</form>
	<?php
} else {
	?>
	<form class="form-signin">
		<h4 class="form-signin-heading">Det går inte att registrera sig för tillfället.</h4>
		<hr>
		<center><a href="?page=Logga-in">Tillbaka</a></center>
	</form>
	<?php
}
?>
<?php include('_footer.php'); ?>