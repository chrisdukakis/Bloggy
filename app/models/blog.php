<?php
class blog extends account {
	
	public function initialize() {	
		if ( $blog = database::select( 'accounts', 'blog_title, blog_description, full_name, bio, blog_visibility, 
										profile_visibility, comment_permissions, message_permissions', get_object_vars( $this ), null, null, null ) ) {
			foreach ( $blog as $row ) {
				return $row;
			}	
		}
		else {
			header( 'Location: 404.php' );
		}
	}
	public function load( $offset, $limit ) {
		while ( $blog = database::select( 'accounts', 'id, uid, username, full_name, blog_title, blog_description', get_object_vars( $this ), null, null, null ) ) {
			return $blog;
		}	
	}
	
}
?>