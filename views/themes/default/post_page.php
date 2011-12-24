			<div class="post" id="<?php echo $post['id'];?>">
				<h2><a href="index.php?id=<?php echo $post['id']; ?>"><?php echo $post['title'];?></a></h2>
				<div id="date"><?php echo $post['date']; ?></div>
				<img src="uploads/medium/<?php echo $post['id']; ?>.jpeg" onclick="open_slider('<?php echo $post['id']; ?>')">
				<div id="photoshooted_date"><?php echo $post['photoshoot_date']; ?></div>
				<p><?php echo $post['description']; ?></p>
			</div>
<?php
	if ( $blog['comment_permissions'] == 2 || 
		 ( $blog['comment_permissions'] == 1 && $visibility = 2 ) ) {
		echo 'ok';
	}
?>			
			