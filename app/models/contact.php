<?php
class contact extends account{
	
	public $id, $u1, $u2, $status;  
		
	public function add() {
		$this->u1 = $_SESSION['user'];	
		$contact = self::get_status();
		$status = $contact['status'];
		if ( $status == -1 ) {
			$input = array_merge( get_object_vars( $this ), array( 'status' => 1 ) );
			return database::insert( 'contacts', $input );
		}	
		elseif ( $status == 0 ) {
			return database::update( 'contacts', array( 'u1' => $this->u1, 'u2 ' => $this->u2, 'status' => 1 ), 'id',  $contact['id'] );
		} 
	}
	
	public function accept() {
		$contact = database::select( 'contacts', 'u2', get_object_vars( $this ), null, null );
		if ( $contact['0']['u2'] == $_SESSION['user'] ) {
			return database::update( 'contacts', array( 'status' => 2 ), 'id',  $this->id );
		}
	}
	
	public function delete() {
		$contact = database::select( 'contacts', 'u2', get_object_vars( $this ), null, null );
		if ( $contact['0']['u2'] == $_SESSION['user'] ) {	
			return database::update( 'contacts', array( 'status' => 0 ), 'id',  $this->id );
		}	
	}
	
	public function get_status() {
		if ( $contact = database::select( 'contacts', 'id, u1, status', get_object_vars( $this ), null, null, null ) ) {
				return $contact['0'];
		}
		else {   
			$users = array( 'u1' => $this->u2, 'u2' => $this->u1 ); 
			$contact = array_merge( get_object_vars( $this ), $users );
			if ( $contact = database::select( 'contacts', 'id, u1, status', $contact, null, null, null ) ) {
				return $contact['0'];
			}
			else
				return array( 'status' => -1, 'u1' => $contact['u1'] );
		}
	}
	
	public function get_requests() {
		while ( $contact = database::select( 'contacts', 'id, u1', get_object_vars( $this ), null, null, null ) ) {
			return $contact;
		}
	}
	
	public function load( $limit ) {
		$or = "u2 = '$this->u1' ";
		while ( $contact = database::select( 'contacts', 'id, u1, u2, status', get_object_vars( $this ), null, $limit, $or ) ) {
			return $contact;
		}
	}
	
}
?>