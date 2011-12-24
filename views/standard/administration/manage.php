<section id="editor">
	<button class="close" onclick="close_dialog()" alt="Κλείσιμο"></button>
	<h3>Διαχείρηση αναρτήσεων</h3>
	<ul>
<?php 
if ( isset( $post ) ) {
	foreach ( $post as $post_item ) { 
?>
		<li>
			<h4 id="<?php echo $post_item['id']; ?>" onclick="edit_post('<?php echo $post_item['id']; ?>')"><?php echo $post_item['title']; ?></h4>
			<div id="tasks">
				<button type="button" title="Διαγραφή" class="delete"  onclick="delete_post('<?php echo $post_item['id']; ?>')"></button>						
				<button type="button" title="Επεξεργασία" class="edit" onclick="edit_post('<?php echo $post_item['id']; ?>')"></button>				
			</div>
		</li>
<?php
	}
}
?>
	</ul>
</section>