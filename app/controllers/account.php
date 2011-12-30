<?php
class AccountController extends account {
	
	public function create() {
		if( !empty( $this->full_name ) && 
		    !empty( $this->username ) && 
		    !empty( $this->password ) && 
		    !empty( $this->password_2 ) && 
		    !empty( $this->blog_title ) ) {
			if ( $this->password !== $this->password_2 ) {
				throw new Exception( password_mismatch );
			}
			$account = database::select( 'accounts', 'id', array( 'username' => $this->username ), 
							null, null, null );			
			if ( !isset( $account['0']['id'] ) ) {
				return parent::create();
			}	
			else 
				throw new Exception( username_taken );	
		}
		else
			throw new Exception( fields_undefined );
	}
	
	public function view() {
		if ( isset( $_SESSION['user'] ) ) {
			$this->username = $_SESSION['user'];
			$account = parent::get_settings();
			require 'views/standard/header.php';
			require 'views/standard/account.php';
			require 'views/standard/footer.php';
		}
		else {
			require 'views/standard/header.php';
			require 'views/standard/register.php';
			require 'views/standard/footer.php';
		}
		return;
	}
	
	public function update() {
		if ( isset( $this->profile_photo ) ) {
			$photo = new photo;
			$photo->file = $this->profile_photo;
			$photo->name = random_string( 'alphanumeric', 16 );
			$photo->type = 'profile';
			$photo->upload();
			$this->profile_photo = $photo->name; 
		}
		return parent::update();
	} 
}
?>
