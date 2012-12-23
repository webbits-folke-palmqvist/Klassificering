<?php include('_top.php'); ?>
<?php if($_SESSION['user']){header('location: ?page=Start');} ?>
<form class="form-signin" action="?page=Process&action=login" method="POST">
	<h2 class="form-signin-heading">Var vänlig att logga in</h2>
	<h5><?php error(); ?></h5>
	<input name="username" type="text" class="input-block-level" placeholder="Användarnamn">
	<input name="password" type="password" class="input-block-level" placeholder="Lösenord">
	<button class="btn btn-large btn-success btn-block" type="submit">Logga in</button>
	<hr>
	<center>Inte medlem? <a href="?page=Registrera">Registrera dig här</a></center>
</form>
<?php include('_footer.php'); ?>