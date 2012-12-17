<?php
include('_top.php');
login();

$user_id = user_id($_SESSION['user']);
?>
<div class="hero-unit">
	<ul class="breadcrumb">
		<li>Start <span class="divider">/</span></li>
		<li class="active">Mitt konto</li>
		<li class="pull-right"><?php if(rank() == 9){ ?><a class="btn" href="?page=Admin">Admin panel</a><?php } ?> <a class="btn btn-inverse" href="?page=Mitt-konto">Mitt konto</a> <a class="btn btn-danger" href="?page=Process&action=logout">Logga ut</a></li>
	</ul>
</div>
<?php include('_bottom.php'); ?>