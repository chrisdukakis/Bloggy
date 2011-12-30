<?php

require 'app/initialize.php';

if ( !empty( $_REQUEST ) ) {
	$input = $_REQUEST;
	if ( isset( $_GET['mode'] ) && $_GET['mode'] == 'ajax_load' || isset( $_GET['view'] ) ) {
		array_shift( $input );
	}
	elseif ( !empty( $_FILES['0'] ) ) {
		$input = $_FILES + $input;
	}	
	$submition_type = key( array_slice( $input, -1, 1 ) );
	array_pop( $input );
	$controller_name = strstr( $submition_type, '_', true );
	$file = 'app/controllers/'.$controller_name.'.php';
	$controller_name = ucfirst( $controller_name ).'Controller';		
	$method_name = ltrim( strstr( $submition_type, '_' ), '_' );
	if ( file_exists( $file ) ) {
		require $file;	
		$object = new $controller_name;  
		foreach ( $input as $key => $value ) {
			$object->$key = $value;
		}
		try {
			$object->$method_name();
		}	
		catch ( Exception $error ) {
			alert( $error );
		}
	}	
}

if ( isset( $_GET['view'] ) ) {
	$input = $_GET;	
	$file = 'app/controllers/'.$_GET['view'].'.php';
	$controller_name = ucfirst( $_GET['view'] ).'Controller';
	array_shift( $input );
	if ( file_exists( $file ) ) {
		require_once $file;	
		$object = new $controller_name;  
		foreach ( $input as $key => $value ) {
			$object->$key = $value;
		}
		$object->view();
	}
	else {
		header( 'Location: index.php' );
		exit;
	}
}
else {
	if ( isset( $_SESSION['user'] ) ) {
		$post = timeline::load( null, 20 );
		rsort( $post );
	}
	require 'views/standard/header.php';
	require 'views/standard/index.php';
	require 'views/standard/footer.php';
}

?>
