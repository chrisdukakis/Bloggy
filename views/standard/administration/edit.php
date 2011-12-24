<section id="editor">
	<button class="close" onclick="close_dialog()" alt="Κλείσιμο"></button>
<?php 
foreach ( $post as $post_item ) { 
?>
<form id="post" method="post" action="index.php">
	<legend>Επεξεργασία ανάρτησης</legend>
	<label for="title">Τίτλος</label>
	<input type="text" name="title" value="<?php echo $post_item['title']; ?>">
	<label for="text">Κείμενο ανάρτησης</label>
	<textarea name="text"><?php echo $post_item['text']; ?></textarea>
	<input type="hidden" name="id" value="<?php echo $post_item['id']; ?>">
	<input type="submit" name="post_update">
</form>
<?php
}
?>
</section>