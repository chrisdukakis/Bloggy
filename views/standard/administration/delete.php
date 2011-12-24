<div id="delete_alert">
<?php 
foreach ( $post as $post_item ) { 
?>
<form method="post" action="index.php">
	<legend><h3>Επιβεβαίωση διαγραφής</h3></legend>
	<p>Είσαι βέβαιος ότι θέλεις να διαγράψεις το "<b><?php echo $post_item['title']; ?></b>";</p>
	<input type="hidden" name="id" value="<?php echo $post_item['id']; ?>">
	<input type="submit" name="post_delete" value="Διαγραφή">
	<button type="button" onclick="close_delete()">Ακύρωση</button>
</form>
<?php
}
?>
</div>
