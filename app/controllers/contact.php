<?php
class ContactController extends contact {
	
	public function view() {
		if ( isset( $_GET['u1'] ) ) {
			$this->u1 = $_GET['u1'];	
		}
		elseif ( isset( $_SESSION['user'] ) ) {
			$this->u1 = $_SESSION['user'];
		}
		else {
			header ( 'Location:index.php' );
			exit;
		}
		$contact = parent::load( 20 );
		require 'views/standard/header.php';
		require 'views/standard/contacts.php';
		require 'views/standard/footer.php';
	}
	
	public function add() {
		parent::add();
	}

	public function accept() {
		parent::accept();
	}	

}
?>