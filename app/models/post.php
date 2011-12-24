<?php
class post extends blog{
	
	public $pid, $title, $text, $file, $time, $visibility;  
		
	public function create() {
		if ( database::insert( 'posts', get_object_vars( $this ) ) ) {
			if ( isset( $this->file ) ) {
				if ( $this->file['error'] == 0 ) {
					
				}
				else 
					throw new Exception( file_error );
			}
			return alert( posted );
		}	
	}
	
	public function update() {
		if ( database::update( 'posts', get_object_vars( $this ), 'id', $this->id ) ) {
			return alert( edited );
		}
	}
	
	public function delete() {
		$this->visibility = 0;
		if ( database::update( 'posts', get_object_vars( $this ), 'id', $this->id ) ) {		
			return alert( deleted );
		}
	}	
	
	public function load( $offset, $limit ) {
		$this->visibility = 1;
		while ( $post = database::select( 'posts', '*', get_object_vars( $this ), $offset, $limit, null ) ) {
			return $post;
		}
	}
	
}
?>