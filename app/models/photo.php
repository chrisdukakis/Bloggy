<?php
class photo extends post {
	
	public $file, $type, $name;
	
	public function upload() {
		if (    $this->file['type'] == 'image/jpeg' 
		     || $this->file['type'] == 'image/gif' 
			 || $this->file['type'] == 'image/png' 
			 || $this->file['type'] == 'image/bmp' ) {
				switch ( $this->type ) {
					case 'profile':
						$image = self::crop( $this->file['tmp_name'], 60 );
						return imagejpeg( $image, '././uploads/photos/profile/thumbs/'.$this->name.'.jpeg', 100 );			
					break;
					case 'photostream';
					break;
					default:
					break;
				}
		}
		else
			throw new Exception( invalid_file );	
	}
	
	protected static function scale( $file, $size ) {
		$max_size = array( 
						'width'  => $file['settings'][$size.'_width'],
						'height' => $file['settings'][$size.'_height']
					);	
		$size = getimagesize( $file['tmp_name'] );
		list( $width, $height ) = $size;
		$source = imagecreatefromstring( file_get_contents( $file['tmp_name'] ) );
		$proportion = $width / $height;
		if ( $proportion > 1 ) {
			if ( $width <= $max_size['width'] ) {
				$image_width = $width;
				$image_height = $height;
			}
			else {
				$image_width = $max_size['width'];
				$image_height = $max_size['height'] / $proportion;
			}	
		}
		elseif ( $proportion < 1 ) {
			if ( $height <= $max_size['height'] ) {
				$image_width = $width;
				$image_height = $height;
			}
			else {
				$image_height = $max_size['height'];
				$image_width = $max_size['height'] * $proportion;
			}	
		}
		else {
			if ( $width <= $max_size['width'] ) {
				$image_width = $width;
				$image_height = $height;				
			}
			else {
				$image_width = $max_size['height'];
				$image_height = $max_size['height'];
			}
		}
		$image = imagecreatetruecolor( $image_width, $image_height );
		if ( imagecopyresampled( $image, $source, 0, 0, 0, 0, $image_width , $image_height , $width , $height ) ) {		
			return $image;
		}
		else
			throw new Exception( scale_error );
	}
	protected function crop( $file, $size ) {
		$source = imagecreatefromstring( file_get_contents( $file ) );
		list( $width, $height ) = getimagesize( $file );
		$difference = $width - $height;
		if ( $difference > 0 ) {
			$crop_width = $difference / 2; 
			$crop_height = 0;
			$thumb_width = $width - $difference;
			$thumb_height = $height;
		}
		else {
			$crop_height = abs( $difference ) / 2; 
			$crop_width = 0;
			$thumb_width = $width;
			$thumb_height = $height - abs( $difference );
		}
		$thumb = imagecreatetruecolor( $size, $size ) ;
		imagecopyresampled( $thumb, $source, 0, 0, $crop_width, $crop_height, $size , $size , $thumb_width , $thumb_height );
		return $thumb;
	}
	
}	

?>