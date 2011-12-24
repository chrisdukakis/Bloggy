	<div id="register_wrap">
	<section id="register">
<?php 
if ( isset( $_SESSION['settings'] ) ) {
?>	
		<form id="register_form" method="post" action="index.php" enctype="multipart/form-data">	
			<fieldset>
				<legend>Ρυθμίσεις Προφίλ</legend>
				<label for="profile_photo">Φωτογραφία προφίλ</label>
				<input type="file" name="profile_photo">
				<label for="bio">Λίγα λόγια για εσένα</label>
				<textarea name="bio" rows="4"></textarea>
				<label for="interests">Ενδιαφέροντα</label>
				<textarea name="interests" rows="2"></textarea>
				<label for="email">Διευθύνση email</label>
				<input type="email" name="email">
			</fieldset>
			<fieldset id="privacy">
				<legend>Ρυθμίσεις Απορρήτου</legend>				
				<label for="blog_visibility">Μπορούν να βλέπουν το ιστολόγιό μου</label>
				<select name="blog_visibility">
					<option value="2">Όλοι οι χρήστες</option>
					<option value="1">Μόνο οι επαφές μου</option>
				</select>
				<label for="profile_visibility">Μπορούν να βλέπουν το προφίλ μου</label>
				<select name="profile_visibility">
					<option value="2">Όλοι οι χρήστες</option>
					<option value="1">Μόνο οι επαφές μου</option>
					<option value="0">Κανένας</option>					
				</select>
				<label for="comment_permissions">Μπορούν να σχολιάζουν τις αναρτήσεις μου</label>
				<select name="comment_permissions">
					<option value="2">Όλοι οι χρήστες</option>
					<option value="1">Μόνο οι επαφές μου</option>
					<option value="0">Κανένας</option>
				</select>
				<label for="message_permissions">Μπορούν να μου αποστέλνουν μηνύματα</label>
				<select name="message_permissions">
					<option value="2">Όλοι οι χρήστες</option>
					<option value="1">Μόνο οι επαφές μου</option>
					<option value="0">>Κανένας</option>
				</select>
				<input type="submit" name="account_update" value="Εφαρμογή ρυθμίσεων">
			</fieldset>			
		</form>
<?php
}
else {
?>
		<form id="register_form" method="post" action="index.php?view=account">
			<fieldset>		
				<legend>Εγγραφή χρήστη</legend>
				<label for="full_name">Ονοματεπώνυμο</label>
				<input type="text" name="full_name" value="<?php if ( isset( $_POST['account_create'] ) ) echo $_POST['full_name']; ?>">
				<label for="username">Όνομα χρήστη</label>
				<input type="text" name="username" value="<?php if ( isset( $_POST['account_create'] ) ) echo $_POST['username']; ?>">				
				<label for="password">Κωδικός</label>
				<input type="password" name="password">				
				<label for="password">Επιβεβαίωση κωδικού</label>
				<input type="password" name="password_2">
				<label for="blog_title">Τίτλος ιστολογίου</label>
				<input type="text" name="blog_title" value="<?php if ( isset( $_POST['account_create'] ) ) echo $_POST['blog_title']; ?>">
				<label for="blog_description" >Περιγραφή ιστολογίου</label>
				<textarea name="blog_description" rows="4" ><?php if ( isset( $_POST['account_create'] ) ) echo $_POST['blog_description']; ?></textarea>								
				<input type="submit" name="account_create" value="Επόμενο &raquo;">
			</fieldset>
		</form>
<?php
}
?>		
	</section>	
	</div>