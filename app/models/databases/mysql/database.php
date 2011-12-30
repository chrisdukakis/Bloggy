<?php

mysql_connect( $settings['database']['hostname'], $settings['database']['username'], $settings['database']['password'] );
mysql_select_db( $settings['database']['name'] );
				 
class database {

	public static function select( $table, $cols, $where, $offset, $limit, $or ) {
		foreach ( $where as $target_col => $value ) {
			if ( isset( $value ) ) {
				$value = self::escape( $value );
				$sets[] = "$target_col = '$value'";
			}	
		}
		if ( isset( $sets ) ) {
			$where = implode( ' AND ', $sets );
			$where = ' WHERE '.$where;	
		}
		else		
			$where = null;
		if ( isset( $or ) ) {
			$where = $where.' OR '.$or;
		}
		if ( isset( $offset ) ) {
			$where = $where.' AND id < '.$offset;
		}	
		if ( $table == 'contacts' ) {
			$order = ' ORDER by u1, u2 ';
		}
		else
			$order = ' ORDER by id DESC ';
		if( !isset( $limit ) ) {
			$limit = null;
		}
		else 
			$limit = ' LIMIT '.$limit;
		$query = mysql_query( "SELECT $cols FROM $table $where $order $limit" );
		if ( $query ) {
			while ( $row = mysql_fetch_array( $query ) ) {
				$data[] = $row;
			}
			if ( isset( $data ) ) {
				return $data;
			}
			else
				return false;
		}
		else 
			return false;
	}

	public static function insert( $table, $fields ) {
		foreach ( $fields as $col => $value ) {
			if ( isset( $value ) ) {
				if ( is_array( $value ) ) {
					$value = array_pop( $value );
				}
				$value = htmlspecialchars( $value );
				$value = nl2br( $value, false );
				$value = self::escape( $value );
				$sets[] = "$col = '$value'";
			}	
		}
		$input = implode( ', ' ,$sets );		
		return mysql_query( "INSERT INTO $table SET $input" );
	}
	
	public static function update( $table, $fields, $target, $target_value ) {
		foreach ( $fields as $col => $value ) {
			if ( isset( $value ) ) {
				if ( is_array( $value ) ) {
					$value = array_pop( $value );					
				}			
				$value = htmlspecialchars( $value );
				$value = nl2br( $value, false );
				$value = self::escape( $value );
				$sets[] = "$col = '$value'";
			}	
		}
		$input = implode( ', ' ,$sets );		
		return mysql_query( "UPDATE $table SET $input WHERE $target = '$target_value'" );
 	}
	
	protected static function escape( $string ) {
		return mysql_real_escape_string( $string );
	}
	
}
?>