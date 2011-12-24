<?php
class timeline {

	public static function load( $offset, $limit ) {
		$contact = new contact;
		$contact->u1 = $_SESSION['user'];
		$contact = $contact->load( null );
		
		$post = new post;
		$stream = array();
		if ( isset( $contact ) ) {
			foreach ( $contact as $contact_item ) {
				if ( $contact_item['status'] == 2 || ( $contact_item['status'] == 1 && $contact_item['u1'] == $_SESSION['user'] ) ) {
					if ( $contact_item['u1'] !== $_SESSION['user'] ) {
						$post->username = $contact_item['u1'];
					}
					else
						$post->username = $contact_item['u2'];
					$posts = $post->load( $offset, $limit );
					if( $posts !== null ) {
						$stream = array_merge( $stream, $posts );
					}
				}
			}	
		}	
		if ( isset( $stream ) ) {
			return $stream;
		}
		else
			return false;
	}	

}
?>