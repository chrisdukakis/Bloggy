<section id="create">
<button class="close" onclick="close_dialog()" alt="Κλείσιμο"></button>
<form id="post" method="post" action="index.php">
	<legend>Νέα ανάρτηση</legend>
	<label for="title">Τίτλος</label>
	<input type="text" name="title" <?php if ( isset( $_POST['title'] ) ) {?>value="<?php echo $_POST['title'];?>"<?php } ?>>
	<textarea name="text"><?php if ( isset( $_POST['text'] ) ) { echo $_POST['text']; } ?></textarea>
	<input type="submit" name="post_create">
</form>
</section>