<?php

$species_json = '';

foreach($species as $specie):

  $spots = '';
  foreach($sightings as $sighting){
    
    if($sighting->getSpecieId() == $specie->getId()){
    
      $record = RecordPeer::retrieveByPk($sighting->getRecordId());
        
      $company = $general_info->getCompany();
      $company_id = ($company)? $company->getId() : 'none';
      $company_name = ($company)? $company->getName() : 'none';
    
      $skipper = $general_info->getSkipper();
      $skipper_name = ($skipper)? $skipper->getName() : 'none';
      
      $guide = $general_info->getGuide();
      $guide_name = ($guide)? $guide->getName() : 'none';
      
      $spots .= '{
        "lat":"'.$record->getLatitude().'",
        "lon":"'.$record->getLongitude().'",
        "gi_id":"'.$general_info->getId().'",
        "gi_code":"'.$general_info->getCode().'",
        "company_id":"'.$company_id.'",
        "company_name":"'.$company_name.'",
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
  
<?php 
  if(strcmp($spots,'') != 0){
    $species_json .= '{"id":"'.$specie->getId().'","name":"'.$specie->getName().'","code":"'.$specie->getCode().'","baselat":"'.(($company)? $company->getBaseLatitude() : '').'","baselng":"'.(($company)? $company->getBaseLongitude() : '' ).'","spots":['.substr($spots,0,-1).']},';
  };
?>

<?php endforeach; ?>

<?php if(strcmp($species_json,'') != 0): ?>
  {"id":"<?php echo $general_info->getId(); ?>","code":"<?php echo $general_info->getCode(); ?>","species":[<?php echo substr($species_json,0,-1) ?>]}
<?php endif; ?>
