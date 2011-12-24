<?php
class CommentController extends comment { 
	
	public function post() {
		if ( isset( $_SESSION['user'] ) && 
		     !empty( $this->text ) || 
		     ( !isset( $_SESSION['user'] ) 
		       && !empty( $this->full_name ) ) ) {
			if ( isset( $_SESSION['user'] ) ) {
				$this->username = $_SESSION['user']; 
				$this->assoc_id = $_GET['id']; 
				$this->id = null;
			}
			return parent::post();
		}
		else
			return false;
	}

}
?>