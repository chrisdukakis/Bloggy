<?php
class PostController extends post {  
		
	public function create() {
		if ( !empty( $this->title ) && !empty( $this->text ) ) {	
			$this->username = $_SESSION['user'];
			$this->time = date( 'j/n/Y' );
			return parent::create();
		}
		else 
			throw new Exception( fields_undefined );
	}
	
	public function update() {
		$updates = array( $this->title, $this->text );
		$this->title = null;
		$this->text = null;
		$post = parent::load( null, 1 );
		if ( $post['0']['username'] == $_SESSION['user'] ) {
			list( $this->title, $this->text ) = $updates;
			return parent::update();
		}
	}
	public function delete() {
		$post = parent::load( null, 1 );
		if ( $post['0']['username'] == $_SESSION['user'] ) {
			return parent::delete();
		}	
	}

}
?>