
<?php
  //$sightings = $sf_data->getRaw('sightings');
  //echo print_r($sightings);
  $options = '';
  foreach($sightings as $key => $value){
    $options .= "<option value='" . $key . "'>" . $value. "</option>";
  }
  echo $options;
?>