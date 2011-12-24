<?php

require 'app/initialize.php';

if ( isset( $_SESSION['user'] ) || isset( $_SESSION['settings'] ) ) { 
	return user::logout();	
}
else {
	header( 'Location: index.php' );
	exit;
}	

?>
