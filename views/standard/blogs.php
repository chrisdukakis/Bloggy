<?php
if ( isset( $_SESSION['user'] ) ) {
	require 'app/notifications.php';
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
		<section id="timeline">
<?php
if ( isset( $contact ) ) {
?>
			<section id="contact_notifications">
<?php		
	foreach ( $contact as $contact_request ) {
?>	
			<div id="<?php echo $contact_request['id']; ?>">	
				O/Η <a href="index.php?view=blog&username=<?php echo $contact_request['u1']; ?>"><?php account::get_name( $contact_request['u1'] ); ?></a> επιθυμεί να προστεθεί στις επαφές σου.
				<button type="button" onclick="accept_contact('<?php echo $contact_request['id']; ?>')">Αποδοχή</button>
				<button type="button" onclick="deny_contact('<?php echo $contact_request['id']; ?>')">Απόρριψη</button>
				</form>
			</div>	
<?php			
	}
?>
			</section>
<?php	
}
if ( isset( $blog ) ) { 	
?>
			<h2>Περιήγηση</h2>
<?php
	foreach ( $blog as $blog_item ) {
?>	
			<section class="stream_item">
				<a href="index.php?view=blog&username=<?php echo $blog_item['username']; ?>">
				<img src="uploads/photos/profile/thumbs/<?php account::get_profile_photo( $blog_item['username'] ); ?>.jpeg">
				<?php echo $blog_item['full_name']; ?></a>
			</section>
<?php		
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
else {
?>
	<section id="wrap">
		<section id="intro">	
			<p>
				Το Bloggy είναι μια online εφαρμογή που σου επιτρέπει να δημιουργήσεις το δικό σου ιστολόγιο και να συνδεθείς με άλλα.
				<a href="register.php" id="join">Γίνε μέλος τώρα!</a>
			</p>
		</section>	
		<form id="login_form" method="post" action="index.php">
			<fieldset>
				<legend>Είσοδος</legend>
				<label for="username">Όνομα χρήστη</label>
				<input type="text" name="username" value="<?php if ( isset( $_POST['user_authenticate'] ) ) { echo $_POST['username']; } ?>">
				<label for="password">Κωδικός</label>
				<input type="password" name="password">
				<input type="submit" name="user_authenticate" value="Είσοδος">
			</fieldset>
		</form>
	</section>	
<?php
}
?>