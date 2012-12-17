<?php
include('_top.php');
login();

$user_id = user_id($_SESSION['user']);
?>
<div class="hero-unit">
	<ul class="breadcrumb">
		<li><a href="?page=Hem">Start</a> <span class="divider">/</span></li>
		<li class="active">Mitt konto</li>
		<li class="pull-right"><?php if(rank() == 9){ ?><a class="btn" href="?page=Admin">Admin panel</a><?php } ?> <a class="btn btn-inverse" href="?page=Mitt-konto">Mitt konto</a> <a class="btn btn-danger" href="?page=Process&action=logout">Logga ut</a></li>
	</ul>
	<div class="row">
		<div class="span5">
			<table class="table table-hover">
				<tr>
					<td><strong>Din statistik</strong></td>
					<td></td>
				</tr>
				<tr>
					<td><strong>Antal dokument:</strong></td>
					<td><?php count_rows_user("document", $user_id); ?> st</td>
				</tr>
				<tr>
					<td><strong>Antal kategorier:</strong></td>
					<td><?php count_rows_user("category", $user_id); ?> st</td>
				</tr>
			</table>
		</div>
		<div class="span5">
			
		</div>
	</div>
</div>
<?php include('_bottom.php'); ?>