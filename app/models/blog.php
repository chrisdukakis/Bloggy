<?php
class blog extends account {
	
	public function initialize() {	
		if ( $blog = database::select( 'accounts', '*', get_object_vars( $this ), null, null, null ) ) {
			foreach ( $blog as $row ) {
				return $row;
			}	
		}
		else {
			header( 'Location: 404.php' );
		}
	}
	public function load( $offset, $limit ) {
		while ( $blog = database::select( 'accounts', '*', get_object_vars( $this ), null, null, null ) ) {
			return $blog;
		}	
	}
	
}
?>