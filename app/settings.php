<?php
return $settings = array(	
	'database'    => array(
						'type'		=> 'mysql',
						'name'		=> 'bloggy_db',
						'hostname'	=> '127.0.0.1',
						'username'	=> 'root', 
						'password'	=> '' 
 					 ),
	'photos'	  => array(
						'large_width'   => 800,
						'large_height'  => 600,
						'medium_width'  => 600,
						'medium_height' => 450
					 ),		
	'load_limit'  => 10,				 
	'date_format' => date( 'j/n/Y' )
);
?>