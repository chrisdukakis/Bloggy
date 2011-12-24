<?php
class BlogController extends blog {
	public function view() {
		if ( isset( $_GET['username'] ) ) {
			foreach ( get_object_vars( $this ) as $key => $value ) {
				if ( isset( $value ) ) {
					if ( $key !== 'username' ) {
						$this->$key = null;
					}
				}	
			}
		
			$blog = parent::initialize();

			$blog['theme'] = 'default';
			require 'views/themes/'.$blog['theme'].'/header.php';
	
			if ( isset( $_SESSION['user'] ) ) {
				$contact = new contact;
				$contact->u1 = $_SESSION['user'];
				$contact->u2 = $_GET['username'];
				$contact = $contact->get_status();
				$status = $contact['status'];
				if ( ( $status == 0 || $status == -1 ) && $_GET['username'] !== $_SESSION['user'] ) {
					$add = true;
				}				
				$u1 =  $contact['u1'];
			}
		
			if ( $blog['comment_permissions'] == 2 ||
			     ( isset( $_SESSION['user'] ) && $_GET['username'] == $_SESSION['user'] ) ||
		         ( $blog['comment_permissions'] == 1 && isset( $status ) && ( $status == 2 || ( $status == 1 && $u1 == $_GET['username'] ) ) ) ) {
				$comments = 1;
			}
			else {
				$comments = 0;
			}
		
			if (  $blog['blog_visibility'] == 2 || 
			      ( isset( $_SESSION['user'] ) && $_GET['username'] == $_SESSION['user'] ) || 
			      ( isset( $status ) && $status == 2 ) ||
		          ( isset( $status ) && $status == 1 && $u1 == $_GET['username'] ) ) {
				$visibility = 2;
				$post = new post;
				$post->username = $_GET['username'];
				if ( isset( $_GET['id'] ) ) {
					$post->id = $_GET['id'];
					$post = $post->load( null, 1 );	

					$comment = new comment;	
					$comment->assoc_id = $_GET['id'];
					$comment = $comment->load_comments( null );
				}
				else {
					if ( isset( $_GET['cat'] ) ) {
						$post->category = $_GET['cat'];
					}	
					$post = $post->load( null, 10 );
				}
			}
			elseif ( isset( $status ) && $status == 1 && $u1 == $_SESSION['user'] ) {	
				$visibility = 1;
			}
			else {
				$visibility = 0;
			}	
		
			require 'views/themes/'.$blog['theme'].'/index.php';
			require 'views/themes/'.$blog['theme'].'/sidebar.php';
			require 'views/themes/'.$blog['theme'].'/footer.php';
		}
		else {
			$blog = parent::load( null, 50 );
			require 'views/standard/header.php';
			require 'views/standard/blogs.php';
			require 'views/standard/footer.php';
		}	
	}	
}
?>