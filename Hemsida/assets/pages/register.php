<?php include('_top.php'); ?>
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
<?php include('_bottom.php'); ?>