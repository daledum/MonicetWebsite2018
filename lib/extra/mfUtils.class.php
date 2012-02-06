<?php
class mfUtils {
  public static function convertLatLong($value)
  {
  	$len = strlen($value);
    if (strcmp(substr($value,0,1),'-') != 0){
      if ($len > 7)
      {
        $degrees = (int)substr($value, 0, 2);
        $minutes = (int)substr($value, 4, 2);
        
        if ((strlen(strstr($value, '\'')) > 1) || (strlen(strstr($value, '"')) == 1) || (strlen(strstr($value, '\'\'')) == 2))
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
    else{
      if ($len > 8)
      {
        $degrees = (int)substr($value, 1, 3);
        $minutes = (int)substr($value, 5, 3);
        
        if ((strlen(strstr($value, '\'')) > 1) || (strlen(strstr($value, '"')) == 1) || (strlen(strstr($value, '\'\'')) == 2))
        {
          $seconds = (int)substr($value, 8, 3);
          return round($degrees + ($minutes + ($seconds)/60)/60, 4);
        }
        else {
          $seconds = (int)substr($value, 8, 4);
          return round($degrees + ($minutes + $seconds/1000)/60, 4);
        }
      }
      return $value;
    }
    
    
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
  
  public static function gerarCodigoGi($company_id, $date){
      $daily_number = GeneralInfoQuery::create()
                        ->filterByCompanyId($company_id)
                        ->filterByDate($date)
                        ->count();
      //$vessel = VesselPeer::retrieveByPK($vessel_id);
      $company = CompanyPeer::retrieveByPk($company_id);
      return strtoupper($company->getAcronym()) . substr(str_replace('-', '',$date), -6) . "-" . ($daily_number + 1);
  }
  
  public static function gerarCodigoWi($company_id, $date){
      $daily_number = WatchInfoQuery::create()
                        ->filterByCompanyId($company_id)
                        ->filterByDate($date)
                        ->count();
      //$vessel = VesselPeer::retrieveByPK($vessel_id);
      $company = CompanyPeer::retrieveByPk($company_id);
      return strtoupper($company->getAcronym()) . substr(str_replace('-', '',$date), -6) . "-" . ($daily_number + 1);
  }
}
?>
