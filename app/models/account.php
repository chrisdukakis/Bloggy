<?php
class account {
	
	public $id,
		   $full_name, 
		   $uid, 
		   $username, 
		   $password,
		   $password_2,
		   $blog_title,
		   $bio,
		   $interests,
		   $email,
		   $blog_description,
		   $blog_visibility,
		   $profile_visibility, 
		   $comment_permissions,
		   $message_permissions,
		   $theme;

	public function create() {
		$this->password = md5( $this->password );
		$this->password_2 = null;
		database::insert( 'accounts', get_object_vars( $this ) );
		$_SESSION['settings'] = $this->username;
		$_SESSION['full_name'] = $this->full_name;
		$_SESSION['uid'] = $this->uid;
		return;
	}
	
	public function get_settings() {
		$account = database::select( 'accounts', '*', array( 'username' => $this->username ), null, null, null );
		return $account = $account['0'];
	}
	
	public function update() {
		if ( isset( $_SESSION['user'] ) ) {
			$username = $_SESSION['user'];
		}
		elseif ( isset( $_SESSION['settings'] ) ) {
			$username = $_SESSION['settings'];
			$_SESSION['user'] = $username;
			unset( $_SESSION['settings'] );	
		}
		return database::update( 'accounts', get_object_vars( $this ), 'username', $username );
	}
	
	public static function get_name( $username ){
		if ( $account = database::select( 'accounts', 'full_name', array( 'username' => $username ), null, null, null ) ) {
			echo $account['0']['full_name'];
			return true;
		}
		else
			return false;
	}
	
	public static function get_profile_photo( $username ){
		if ( $account = database::select( 'accounts', 'profile_photo', array( 'username' => $username ), null, null, null ) ) {
			echo $account['0']['profile_photo'];
			return true;
		}
		else
			return false;
	}	
}
?>
