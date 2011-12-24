<section id="sidebar">
	<div id="profile">
<?php 
if ( isset( $blog['bio'] ) ) {
?>
			<h3>	
				<a href="profile.php?u=<?php echo $_GET['username']; ?>"><?php echo $blog['full_name']; ?></a>
			</h3>
		<p>		
		<img src="uploads/photos/profile/thumbs/<?php account::get_profile_photo( $_GET['username'] ); ?>.jpeg">		
			<?php echo $blog['bio']; ?>
		</p>
<?php
}
?>	
	</div>
<?php
if ( $visibility !== 0 && isset( $add ) && $add == true ) {
?>	
	<div id="add">
		<button type="button" onclick="add_contact2('<?php echo $_GET['username']; ?>')">Προσθήκη στις επαφές</button>	
	</div>
<?php 
}
?>	
</section>