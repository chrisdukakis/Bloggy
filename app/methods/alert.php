<?php
function alert( $error ) {
	if ( is_object( $error ) ) {
		echo '<div id="alert_bar">'.$error->getMessage().'</div>';
	}
	else {
		echo '<div id="alert_bar">'.$error.'</div>';
	}
	return;
}
?>
