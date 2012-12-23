<?php
include('_top.php');

$code = secure($_GET['code']);

$result = mysql_query("SELECT * FROM document WHERE share = '$code' AND deleted = '0'");
$num_rows = mysql_num_rows($result);

if($num_rows == 1){
	$result = mysql_query("SELECT title,content FROM document WHERE share = '$code' LIMIT 1");
	$row = mysql_fetch_row($result);
	?>
	<div class="hero-unit">
		<center><h2><?php echo $row[0]; ?></h2></center>
		<hr style="background-color: #333333;">
		<?php echo $row[1]; ?>
	</div>
	<?php
} else {
	header('location: ?page=Start');
}

include('_footer.php');
?>