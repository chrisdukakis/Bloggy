<?php
function random_string( $type, $length ) {
	if ( $type == 'int' ) {
		$characters = str_shuffle( '0123456789' );
	}	
	elseif ( $type == 'alphanumeric' ) {
		$characters = str_shuffle( '0123456789abcdefghijklmnopqrstuvwxyz0123456789' );
	}	
	else
		return false;
	$random_string = '';
	for ( $i = 0; $i < $length; $i++ ) {
		$random_string .= $characters[mt_rand( 0, strlen( $characters ) - 1 )];
	}
	return $random_string;
}
?>