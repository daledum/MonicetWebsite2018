<?php
$spots = '';
foreach($sightings as $sighting){
  
  $record = RecordPeer::retrieveByPk($sighting->getRecordId());
  
  $general_info = GeneralInfoPeer::retrieveByPk($record->getGeneralInfoId());
  
  if($general_info){
    
    $company = $general_info->getCompany();
  
    $skipper = $general_info->getSkipper();
    
    $skipper_name = ($skipper)? $skipper->getName() : 'none';
    
    $guide = $general_info->getGuide();
    
    $guide_name = ($guide)? $guide->getName() : 'none';
    
    $spots .= '{
      "lat":"'.$record->getLatitude().'",
      "lon":"'.$record->getLongitude().'",
      "gi_id":"'.$general_info->getId().'",
      "gi_code":"'.$general_info->getCode().'",
      "company_id":"'.$company->getId().'",
      "company_name":"'.$company->getName().'",
      "date":"'.$general_info->getDate().'",
      "time":"'.$record->getTime().'",
      "n_vessels":"'.$record->getNumVessels().'",
      "skipper":"'.$skipper_name.'",
      "guide":"'.$guide_name.'",
      "total":"'.$sighting->getTotal().'",
      "adults":"'.$sighting->getAdults().'",
      "juveniles":"'.$sighting->getJuveniles().'",
      "calves":"'.$sighting->getCalves().'"
    },';
    
  }
  
  
}
?>

<?php if($general_info): ?>

{"id":"<?php echo $specie->getId() ?>","name":"<?php echo $specie->getName() ?>","code":"<?php echo $specie->getCode() ?>","spots":[<?php echo substr($spots,0,-1) ?>]}

<?php endif; ?>