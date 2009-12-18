<?php
	class mfText {
          public static function generateRandomString($size=8){
            $chars = "abcdefghijkmnopqrstuvwxyz023456789";
            srand((double)microtime()*1000000);
            $i = 0;
            $pass = '' ;
            while ($i <= $size) {
              $num = rand() % 33;
              $tmp = substr($chars, $num, 1);
              $pass = $pass . $tmp;
              $i++;
            }
            return $pass;
	  }
		public static function stripText( $text ){
			$text = mb_strtolower($text);
			$text = self::mb_str_ireplace( 'á', 'a', $text );
			$text = self::mb_str_ireplace( 'à', 'a', $text );
			$text = self::mb_str_ireplace( 'ã', 'a', $text );
			$text = self::mb_str_ireplace( 'ä', 'a', $text );
			$text = self::mb_str_ireplace( 'â', 'a', $text );
			$text = self::mb_str_ireplace( 'é', 'e', $text );
			$text = self::mb_str_ireplace( 'è', 'e', $text );
			$text = self::mb_str_ireplace( 'ê', 'e', $text );
			$text = self::mb_str_ireplace( 'í', 'i', $text );
			$text = self::mb_str_ireplace( 'ì', 'i', $text );
			$text = self::mb_str_ireplace( 'ĩ', 'i', $text );
			$text = self::mb_str_ireplace( 'î', 'i', $text );
			$text = self::mb_str_ireplace( 'ï', 'i', $text );
			$text = self::mb_str_ireplace( 'ó', 'o', $text );
			$text = self::mb_str_ireplace( 'ò', 'o', $text );
			$text = self::mb_str_ireplace( 'õ', 'o', $text );
			$text = self::mb_str_ireplace( 'ö', 'o', $text );
			$text = self::mb_str_ireplace( 'ô', 'o', $text );
			$text = self::mb_str_ireplace( 'ú', 'u', $text );
			$text = self::mb_str_ireplace( 'ù', 'u', $text );
			$text = self::mb_str_ireplace( 'ũ', 'u', $text );
			$text = self::mb_str_ireplace( 'ü', 'u', $text );
			$text = self::mb_str_ireplace( 'û', 'u', $text );
			$text = self::mb_str_ireplace( 'ç', 'c', $text );
			
			$text = preg_replace( '/\W/', ' ', $text );
			$text = preg_replace( '/\ +/', '_', $text );
			$text = preg_replace( '/[\-_]$/', '', $text );
			$text = preg_replace( '/^[\-_]/', '', $text );
			return $text;
		}

		public static function translate( $text, $dictionary = 'messages' ){
			sfLoader::loadHelpers('I18N');
			if ( is_string( $text ) ){
				$str = __( $text, null, $dictionary );
			}else if( is_array( $text ) ){
				$str = array();
				foreach( $text as $index => $string ){
					$str[ $index ] = __( $string, null, $dictionary );
				}
			}else{
				$str = $text;
			}
			return $str;
		}
		
		public static	function mb_str_ireplace($co, $naCo, $wCzym){
	    $wCzymM = mb_strtolower($wCzym);
	    $coM    = mb_strtolower($co);
	    $offset = 0;
	   
	    while(($poz = mb_strpos($wCzymM, $coM, $offset)) !== false)
	    {
	        $offset = $poz + mb_strlen($naCo);
	        $wCzym = mb_substr($wCzym, 0, $poz). $naCo .mb_substr($wCzym, $poz+mb_strlen($co));
	        $wCzymM = mb_strtolower($wCzym);
	    }
	   
	    return $wCzym;
		}
	}
?>
