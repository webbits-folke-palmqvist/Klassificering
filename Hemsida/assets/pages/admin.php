<?php
include('_top.php');
login();
if(rank() != 9){
	header('location: ?page=Hem');
}
?>
<div class="hero-unit">
	<ul class="breadcrumb">
		<li><a class="btn" href="?page=Admin">Start</a></li>
		<li><a class="btn" href="?page=Admin&sub=users">Alla användare</a></li>
		<li class="pull-right"><a class="btn" href="?page=Hem">Tillbaka</a></li>
	</ul>
	<?php
	$page = $_GET['sub'];

	if($page == ''){
		?>
		<table class="table table-bordered">
			<tr>
				<td>Användare</td>
				<td>123 st</td>
			</tr>
			<tr>
				<td>Dokument</td>
				<td>123 st</td>
			</tr>
			<tr>
				<td>Kategorier</td>
				<td>123 st</td>
			</tr>
		</table>
		<?php
	} elseif ($page == 'users'){
		include('admin_users.php');
	}
	?>
</div>
<?php include('_bottom.php'); ?>