<?php

require 'settings.php';
require 'models/databases/'.$settings['database']['type'].'/database.php';
require './languages/el/definitions.php';
require 'methods/alert.php';
require 'methods/random.php';

function __autoload( $class_name ) {
	require 'models/'.$class_name.'.php';
}

session_start();

if ( isset( $_SESSION['user'] ) || isset( $_SESSION['settings'] ) ) {
	$login = true;
}
else
	$login = false;
	
?>
