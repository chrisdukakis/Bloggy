<section id="posts">
<?php
if( $visibility == 2 ) {
	if ( isset( $post ) ) {
		foreach ( $post as  $post_item ) {
?>
<article class="post">
	<header class="article_header">
		<time><?php echo $post_item['time']; ?></time>
		<h2><a href="index.php?view=blog&username=<?php echo $_GET['username']; ?>&id=<?php echo $post_item['id']; ?>"><?php echo $post_item['title']; ?></a></h2>
<?php if ( isset( $post_item['category'] ) ) { ?>
		<p>Στη κατηγορία:<?php echo $post_item['category']; ?></p>
<?php
}
?>			
	</header>
	<p>
<?php echo $post_item['text']; ?>
	</p>
</article>
<?php
			
			if ( isset( $comment ) ) {
?>
<h3 id="comments_header">Σχόλια</h3>
<?php			
				foreach ( $comment as $comment_item ) {
?>		
					<section class="comment" id="<?php echo $comment_item['id']; ?>">
<?php 
					if ( isset( $comment_item['username'] ) ) {
?>
				<img src="uploads/photos/profile/thumbs/<?php account::get_profile_photo( $comment_item['username'] ); ?>.jpeg" class="small_thumb">
						<a href="index.php?view=blog&username=<?php echo $comment_item['username']; ?>"><?php account::get_name( $comment_item['username'] ); ?></a>
<?php
					}
					else {
?>
						<span class="comment_author"><?php echo $comment_item['full_name']; ?></span><span class="comment_author_email"><?php echo $comment_item['email'] ?></span>
<?php						
					}	
?>							
						<p><?php echo $comment_item['text']; ?></p>
					</section>
<?php				
				}
			}	
			if ( isset( $_GET['id'] ) && $comments == 1 ) {
?>
<form method="post">
<?php			
				if ( !isset( $_SESSION['user'] ) ) {
?>
	<input type="text" name="full_name">
	<input type="email" name="email">
<?php
				}
?>
	<textarea name="text"></textarea>
	<input type="submit" name="comment_post" value="Υποβολή σχολίου">
</form>
<?php						
			} 
		}
	}
	elseif ( isset( $_GET['id'] ) ) {
?>
	<p>404</p>
<?php
	}
	else {
?>
<p>Δεν βρέθηκαν αναρτήσεις γι αυτό το ιστολόγιο.</p>
<?php
	}
}
elseif ( $visibility == 1 && isset( $_SESSION['user'] ) ) {
?>
<p id="visibility_alert">Εκκρεμεί αποδοχή του αιτήματος εξουσιοδότησης.</p>
<?php
}
elseif ( $visibility == 0 && isset( $_SESSION['user'] ) ) {
?>
<p id="visibility_alert">
Το συγκεκριμένο ιστόλογιο είναι προστατευμένο. Πρόσθεσε τον/την χρήστη <b><?php account::get_name( $_GET['username'] ); ?></b> για να συνδεθείς μαζί του/της
<button type="button" onclick="add_contact('<?php echo $_GET['username']; ?>')">Αποστολή αιτήματος</button>
</p>
<p id="request_pending" style="display:none">Εκκρεμεί αποδοχή του αιτήματος εξουσιοδότησης.</p>
<?php
}
else {
?>
<p>Πρέπει να συνδεθείς.</p>
<?php
}
?>
</section>