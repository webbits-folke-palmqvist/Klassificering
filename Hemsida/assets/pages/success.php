<?php include('_top.php'); ?>
<form class="form-signin">
	<center>
		<h3><?php success(); ?></h3>
		<p>Du kan nu <a href="?page=Logga-in">logga in</a>.</p>
	</center>
	<?php if(!$_SESSION['success']){header('location: ?page=Hem');} ?>
</form>
<?php include('_footer.php'); ?>