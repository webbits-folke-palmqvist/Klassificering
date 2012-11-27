<?php
$page = @$_GET['page'];
switch ($page) {
	case '':
		$show_page = "home";
		$title = "Hem";
		break;
	case 'Hem':
		$show_page = "home";
		$title = "Hem";
		break;
	case 'Om-oss':
		$show_page = "about";
		$title = "Om oss";
		break;
	case 'Logga-in':
		$show_page = "login";
		$title = "Logga in";
		break;
	default:
		$show_page = "404";
		$title = "404";
		break;
}
?>
<html>
	<head>
		<title>Online Note · <?php echo $title; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href='assets/css/bootstrap.css' rel='stylesheet' type='text/css'>
		<link href='assets/css/stylesheet.css' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<a class="brand" href="?page=Hem">Online Note</a>
					<ul class="nav">
						<li><a href="?page=Om-oss">Om oss</a></li>
						<li class="divider-vertical"></li>
					</ul>
					<ul class="nav pull-right">
						<li><a href="?page=Logga-in">Logga in</a></li>
						<li class="divider-vertical"></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Konto <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Inställningar</a></li>
							<li class="divider"></li>
							<li><a href="#">Logga ut</a></li>
						</ul>
						</li>
					</ul>
				</div>
			</div>
			<?php include('assets/pages/'.$show_page.'.php'); ?>
		</div>
	</body>
</html>