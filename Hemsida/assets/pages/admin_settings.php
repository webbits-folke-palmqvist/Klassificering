<center><h2>Denna sida är ej fungerande än.</h2></center>
<center><p><strong>Allmänt</strong></p></center>
<table class="table table-bordered">
	<?php
	$query = "SELECT * FROM settings WHERE setting = 'Allmänt' ORDER BY name"; 
	$result = mysql_query($query) or die(mysql_error());

	while($row = mysql_fetch_array($result)){
		?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td style="width:250px;">
				<div class="btn-group">
					<?php
					if($row['onoroff'] == 0){ 
						?>
						<a class="btn" href="#">På</a>
						<a class="btn disabled">Av</a>
						<?php
					} elseif ($row['onoroff'] == 1) {
						?>
						<a class="btn disabled">På</a>
						<a class="btn" href="#">Av</a>
						<?php
					}
					?>
				</div>
			</td>
		</tr>
		<?php
	}
	?>
</table>
<center><p><strong>Registrering</strong></p></center>
<table class="table table-bordered">
	<?php
	$query = "SELECT * FROM settings WHERE setting = 'Registrering' ORDER BY name"; 
	$result = mysql_query($query) or die(mysql_error());

	while($row = mysql_fetch_array($result)){
		?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td style="width:250px;">
				<div class="btn-group">
					<?php
					if($row['onoroff'] == 0){ 
						?>
						<a class="btn" href="#">På</a>
						<a class="btn disabled">Av</a>
						<?php
					} elseif ($row['onoroff'] == 1) {
						?>
						<a class="btn disabled">På</a>
						<a class="btn" href="#">Av</a>
						<?php
					}
					?>
				</div>
			</td>
		</tr>
		<?php
	}
	?>
</table>