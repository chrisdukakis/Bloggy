<?php

require 'app/initialize.php';

if( isset( $_GET['offset'] ) && $_GET['offset'] !== 'null' ) {
	$offset = $_GET['offset'];
}
else {
	$offset = null; 
}
$limit = 10;
$post = new post;
if ( isset( $_GET['id'] ) ) {
	$post->id = $_GET['id'];
	$limit = 1;
}
else {
	$post->username = $_SESSION['user'];
}	
if ( isset( $_GET['cat'] ) ) {
	$post->category = $_GET['cat'];
}	
$post = $post->load( $offset, $limit );
if ( isset( $_GET['act'] ) ) {
	switch ( $_GET['act'] ) {
		case 'edit':	
			require 'views/standard/administration/edit.php';		
			break;
		case 'manage':
			require 'views/standard/administration/manage.php';
			break;
		case 'create':
			require 'views/standard/administration/new.php';
			break;
		case 'delete':
			require 'views/standard/administration/delete.php';
			break;		
	}
}	
?>
