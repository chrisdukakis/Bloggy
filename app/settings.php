<?php
return $settings = array(	
	'database'    => array(
				'type'		=> 'mysql',
				'name'		=> 'bloggy_db',
				'hostname'	=> '127.0.0.1',
				'username'	=> 'root', 
				'password'	=> '' 
 		         ),		
	'load_limit'  => 10,				 
	'date_format' => date( 'j/n/Y' )
);
?>