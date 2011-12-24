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
		<section id="account_edit">
		<form id="register_form" method="post" action="index.php?view=account" enctype="multipart/form-data">	
			<fieldset>
				<legend>Ρυθμίσεις Προφίλ</legend>
				<label for="profile_photo">Φωτογραφία προφίλ</label>
				<input type="file" name="profile_photo">
				<label for="bio">Λίγα λόγια για εσένα</label>
				<textarea name="bio" rows="4"><?php echo $account['bio']; ?></textarea>
				<label for="interests">Ενδιαφέροντα</label>
				<textarea name="interests" rows="2"><?php echo $account['interests']; ?></textarea>
				<label for="email">Διευθύνση email</label>
				<input type="email" name="email" value="<?php echo $account['email']; ?>">
			</fieldset>
			<fieldset id="privacy">
				<legend>Ρυθμίσεις Απορρήτου</legend>				
				<label for="blog_visibility">Μπορούν να βλέπουν το ιστολόγιό μου</label>
				<select name="blog_visibility">
					<option value="2">Όλοι οι χρήστες</option>
					<option value="1" <?php if ( $account['blog_visibility'] == 1 ) { ?>selected="selected"<?php } ?>>Μόνο οι επαφές μου</option>
				</select>
				<label for="profile_visibility">Μπορούν να βλέπουν το προφίλ μου</label>
				<select name="profile_visibility">
					<option value="2">Όλοι οι χρήστες</option>
					<option value="1" <?php if ( $account['profile_visibility'] == 1 ) { ?>selected="selected"<?php } ?>>Μόνο οι επαφές μου</option>
					<option value="0" <?php if ( $account['profile_visibility'] == 0 ) { ?>selected="selected"<?php } ?>>Κανένας</option>					
				</select>
				<label for="comment_permissions">Μπορούν να σχολιάζουν τις αναρτήσεις μου</label>
				<select name="comment_permissions">
					<option value="2">Όλοι οι χρήστες</option>
					<option value="1" <?php if ( $account['comment_permissions'] == 1 ) { ?>selected="selected"<?php } ?>>Μόνο οι επαφές μου</option>
					<option value="0" <?php if ( $account['comment_permissions'] == 0 ) { ?>selected="selected"<?php } ?>>Κανένας</option>
				</select>
				<label for="message_permissions">Μπορούν να μου αποστέλνουν μηνύματα</label>
				<select name="message_permissions">
					<option value="2">Όλοι οι χρήστες</option>
					<option value="1" <?php if ( $account['message_permissions'] == 1 ) { ?>selected="selected"<?php } ?>>Μόνο οι επαφές μου</option>
					<option value="0" <?php if ( $account['message_permissions'] == 0 ) { ?>selected="selected"<?php } ?>>Κανένας</option>
				</select>
				<input type="submit" name="account_update" value="Εφαρμογή ρυθμίσεων">
			</fieldset>			
		</form>
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
else 
	header( 'Location:index.php' );
?>