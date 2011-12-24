<!doctype html>
<html lang="el">
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<link href="stylesheets/style.css" type="text/css" rel="stylesheet">
	<title>Bloggy - Μια κοινότητα ιστολογίων</title>
	<script type="text/javascript" src="scripts/lib/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="scripts/global.js"></script>	
</head>
<body <?php if ( isset( $error ) ) { ?>onload="create()"<?php } ?>>
	<header>
		<div class="container">
			<h1>Bloggy</h1>
<?php			
if ( isset( $_SESSION['user'] ) ) {
?>			
			<nav id="extended">
				<a href="index.php">Αρχική</a>
				<a href="index.php?view=blog&username=<?php echo $_SESSION['user']; ?>">Το Blog μου</a>			
				<a href="index.php?view=blog">Περιήγηση</a>
				<a href="index.php?view=contact">Επαφές</a>
				<a href="index.php?view=account">Λογαριασμός</a>
			</nav>
<?php
}
else {
?>
			<nav id="guest_nav">
	<?php 
	if ( isset( $_SESSION['settings'] ) ) {
	?>		
				<a href="logout.php">Αποσύνδεση</a>
	<?php
	}
	elseif ( isset( $_GET['view'] ) && $_GET['view'] == 'account' ) {
	?>	
				<a href="index.php">Αρχική</a>
	<?php
	}
	else {
	?>			
				<a href="index.php?view=account">Εγγραφή</a>
	<?php
	}
	?>			
			</nav>		
<?php
}
?>		
		</div>
	</header> 