<?php
include('_top.php');
login();
if(rank() != 9){
	header('location: ?page=Start');
}
?>
<div class="hero-unit">
	<ul class="breadcrumb">
		<li><a class="btn" href="?page=Admin">Statistik</a></li>
		<li><a class="btn" href="?page=Admin&sub=users">Alla användare</a></li>
		<li><a class="btn" href="?page=Admin&sub=log">Loggen</a></li>
		<li><a class="btn" href="?page=Admin&sub=settings">Inställningar</a></li>
		<li class="pull-right"><a class="btn" href="?page=Start">Tillbaka</a></li>
	</ul>
	<?php
	$page = secure(@$_GET['sub']);

	if($page == ''){
		?>
		<table class="table table-bordered">
			<tr>
				<td>Användare</td>
				<td><?php count_rows("users"); ?> st</td>
			</tr>
			<tr>
				<td>Dokument</td>
				<td><?php count_rows("document"); ?> st</td>
			</tr>
			<tr>
				<td>Kategorier</td>
				<td><?php count_rows("category"); ?> st</td>
			</tr>
		</table>
		<?php
	} elseif ($page == 'users'){
		include('admin_users.php');
	} elseif ($page == 'log'){
		include('admin_log.php');
	} elseif ($page == 'settings'){
		include('admin_settings.php');
	} elseif ($page == 'pages'){
		include('admin_pages.php');
	}
	?>
</div>
<?php include('_footer.php'); ?>