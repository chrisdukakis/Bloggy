<?php
if ( isset( $_SESSION['user'] ) ) {
?>
<section id="dialog">
<?php 
if ( isset( $error ) ) { 
	require 'administration/new.php';
} 
?>	
</section>
<div class="container">
	<div id="home_wrap">		
		<section id="contacts_list">
		<h2>Επαφές</h2>
<?php
if ( isset( $contact ) ) {
	foreach ( $contact as $contact_item ) {
		if ( $contact_item['status'] == 2 || ( $contact_item['status'] == 1 && $contact_item['u1'] == $_SESSION['user'] ) ) {
			if ( $contact_item['u1'] == $_SESSION['user'] ) { 
				$contact_username = $contact_item['u2']; 
			} 
			else 
				$contact_username = $contact_item['u1'];
?>	
		<div class="contact_item">
			<img src="uploads/photos/profile/thumbs/<?php account::get_profile_photo( $contact_username ); ?>.jpeg">		
			<a href="index.php?view=blog&username=<?php echo $contact_username; ?>"><?php account::get_name( $contact_username ); ?></a>
<?php			
			if ( $contact_item['status'] == 1 && $contact_item['u1'] == $_SESSION['user'] ) {
?>
			<span class="contact_pending">Αναμονή επιβεβαίωσης του αιτήματος.</a>
<?php				
			}
?>			
		</div>
<?php		
		}
	}
}	
?>		
		</section>				
		<section id="sidebar">
			<div id="profile">
				<img src="uploads/photos/profile/thumbs/<?php account::get_profile_photo( $_SESSION['user'] ); ?>.jpeg">
				<a href="index.php?view=profile&username=<?php echo $_SESSION['user']; ?>"><?php echo $_SESSION['full_name'] ?> <span>Προβολή προφίλ</span></a>
			</div>
			<div id="tasks">
				<h3>Εργασίες</h3>
				<button onclick="create()">Δημιουργία ανάρτησης</button>
				<button onclick="manage(null)">Διαχείρηση αναρτήσεων</button>
			</div>
		</section>
	</div>
</div>	
<?php
}
?>