<?php
class UserController extends user {	
	
	public function authenticate() {
		if ( !empty( $this->username ) && !empty( $this->password ) ) {	
			if ( parent::authenticate() ) {
				header ( 'Location: index.php' );
				exit;
			}
			else 	
				throw new Exception( login_wrong_password );
		}		
		else 
			throw new Exception( login_fields_undefined );
	}
	
	public static function logout() {
		unset( $_SESSION['user'] );
		unset( $_SESSION['full_name'] );
		unset( $_SESSION['uid'] );
		header( 'Location: index.php' );
		exit;
	}
	
}
?>
