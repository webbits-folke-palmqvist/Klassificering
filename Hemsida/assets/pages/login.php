<?php include('_top.php'); ?>
<?php include('_meny.php'); ?>
<form class="form-signin" action="?page=process.php" method="POST">
	<h2 class="form-signin-heading">Var vänlig att logga in</h2>
	<input name="username" type="text" class="input-block-level" placeholder="Email address">
	<input name="password" type="password" class="input-block-level" placeholder="Password">
	<button class="btn btn-large btn-success btn-block" type="submit">Logga in</button>
	<hr>
	<center>Inte medlem? <a href="#">Registrera dig här</a></center>
</form>
<?php include('_bottom.php'); ?>