<!DOCTYPE html>
<html lang="el" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="<?php echo $blog['blog_description']; ?>">
		<meta name="author" content="<?php echo $blog['full_name']; ?>">
		<meta name="publisher" content="<?php echo $blog['full_name']; ?>">
		<meta name="owner" content="<?php echo $blog['full_name']; ?>">
		<link rel="stylesheet" type="text/css" href="stylesheets/global.css">		
		<link rel="stylesheet" type="text/css" href="views/themes/<?php echo $blog['theme']; ?>/stylesheets/style.css">
		<script type="text/javascript" src="scripts/lib/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="scripts/global.js"></script>
		<title><?php echo $blog['blog_title']; ?></title>
	</head>
	<body>
		<div id="expand_header" onmouseover="slidedownheader()">
		</div>
		<header id="header">
			<div class="container">
				<h1>Bloggy</h1>		
				<nav>
<?php			
if ( isset( $_SESSION['user'] ) ) {
?>					
					<a href="index.php">Αρχική</a>
					<a href="index.php?view=blog&username=<?php echo $_SESSION['user']; ?>">Το Blog μου</a>			
					<a href="index.php?view=blog">Περιήγηση</a>
					<a href="index.php?view=contact">Επαφές</a>
					<a href="index.php?view=account">Λογαριασμός</a>
<?php
} 
else {
?>					<a href="index.php?view=blog">Περιήγηση</a>
					<a href="index.php">Σύνδεση</a>
					<a href="index.php?view=account">Εγγραφή</a>
<?php
}
?>				
				</nav>			
			</div>		
		</header>
		<section id="wrap" onmouseover="slideupheader()">
			<div class="container">
				<header id="blog_header">
					<h1><a href="index.php?view=blog&username=<?php echo $_GET['username']; ?>"><?php echo $blog['blog_title']; ?></a></h1>
<?php 
if ( isset( $_SESSION['user'] ) && $_SESSION['user'] == $_GET['username'] ) {
?>
					<a href="index.php" class="post_button">Δημιουργία ανάρτησης</a>
					<a href="index.php" class="post_button">Διαχείρηση</a>
<?php	
}
?>
				</header>
				