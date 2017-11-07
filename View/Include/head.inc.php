<!DOCTYPE html>
<html>
<head>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<title>Discographie</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/myStyle.css">


</head>
<body>
	
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="index.php">
			<table>
				<td><div class="kiwi"></div></td>
				<td>Galaxy Swiss Bourdin</td>
			</table>
			
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Artistes</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="index.php?uc=Artistes&action=all">Liste des artistes</a>
						<a class="dropdown-item" href="index.php?uc=Artistes&action=search">Rechercher un artiste</a>
					</div>
				</li>
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Albums</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="index.php?uc=Albums&action=all">Liste des album</a>
						<a class="dropdown-item" href="index.php?uc=Albums&action=search">Rechercher un album</a>
					</div>
				</li>
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Genre</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="index.php?uc=Genres&action=all">Liste des genres</a>
					</div>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<?php if(!isset($_SESSION['user']))
				{
					echo '<a class="" href="index.php?uc=administrer&action=connexion"><input type="button" class="btn" value="Connexion"></a>';
				}else{
					echo '<a class="" href="index.php?uc=administrer&action=deconnexion"><input type="button" class="btn" value="Déconnexion"></a>';
				} ?>
			</form>
		</div>
	</nav>
	
	<p>gvhbjnkl,</p>
	
	
	