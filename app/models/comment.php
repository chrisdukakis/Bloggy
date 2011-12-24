<?php
class comment extends post { 
	
	public $assoc_id, $readed; 
	
	public function post() {
		return database::insert( 'comments', get_object_vars( $this ) );
	}

	public function load_comments( $limit ) {
		while ( $comment = database::select( 'comments', '*', get_object_vars( $this ), null, $limit, null ) ) {
			return $comment;
		}
	} 

}
?>