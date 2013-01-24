
<?php
  //$sightings = $sf_data->getRaw('sightings');
  //echo print_r($sightings);
  $options = '';
  foreach($sightings as $key => $value){
    if(is_object($OBPhoto)) {
      $options .= '<option value="' . $key . '"'.( ($OBPhoto->getSightingId() == $key)? ' selected="selected"': '' ).'>' . $value. '</option>';
    } else {
      $options .= '<option value="' . $key . '">' . $value. '</option>';
    }
  }
  echo $options;
?>