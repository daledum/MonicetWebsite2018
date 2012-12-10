
<?php
  //$sightings = $sf_data->getRaw('sightings');
  //echo print_r($sightings);
echo $OBPhoto->getSightingId();
  $options = '';
  foreach($sightings as $key => $value){
    $options .= '<option value="' . $key . '"'.( ($OBPhoto->getSightingId() == $key)? ' selected="selected"': '' ).'>' . $value. '</option>';
  }
  echo $options;
?>