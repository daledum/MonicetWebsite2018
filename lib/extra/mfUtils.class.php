<?php
class mfUtils {
  public static function convertLatLong($value)
  {
  	$len = strlen($value);
    if ($len > 7)
    {
      $degrees = (int)substr($value, 0, 2);
      $minutes = (int)substr($value, 4, 2);
      if ((strlen(strstr($value, '\'')) > 0) || (strlen(strstr($value, '"')) > 0) || (strlen(strstr($value, '\'\'')) > 0))
      {
        $seconds = (int)substr($value, 7, 2);
        return round($degrees + ($minutes + ($seconds)/60)/60, 4);
      }
      else {
        $seconds = (int)substr($value, 7, 3);
        return round($degrees + ($minutes + $seconds/1000)/60, 4);
      }
      
    }
    return $value;
  }
  
  public static function fromObjectsToArray( $objects )
  {
      $array = array();
      foreach( $objects as $object )
      {
          $array[$object->getId()] = $object;
      }
      return $array;
  }
  
  public static function fromObjectsToArrayWithEmpty( $objects )
  {
      $array[''] = '-------------';
      foreach( $objects as $object )
      {
          $array[$object->getId()] = $object;
      }
      return $array;
  }
}
?>
