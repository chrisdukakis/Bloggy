<?php
if ( isset( $_SESSION['user'] ) ) {
	$contact = new contact;
	$contact->u2 = $_SESSION['user'];
	$contact->status = 1;
	$contact = $contact->get_requests();
}
?>
