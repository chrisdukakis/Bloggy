<?php
class user extends account {	
	
	public function authenticate () {
			$this->password = md5( $this->password );
			if ( $account = database::select( 'accounts', 'username, password, full_name', get_object_vars( $this ), null, null, null ) ) {	
				$_SESSION['user'] = $this->username;
				$_SESSION['full_name'] = $account['0']['full_name'];
				$_SESSION['uid'] = $account['0']['uid'];
				return true;
			}
			else 	
				return false;
	}
	
	public static function logout() {
		if ( isset( $_SESSION['user'] ) ) {
			unset( $_SESSION['user'] );
		}
		else {
			unset( $_SESSION['settings'] );
		}		
		unset( $_SESSION['full_name'] );
		unset( $_SESSION['uid'] );
		header( 'Location: index.php' );
		exit;
	}
	
}
?>
