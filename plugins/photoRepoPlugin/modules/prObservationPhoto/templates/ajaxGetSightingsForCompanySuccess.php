<?php
$options = '';
foreach($sightings as $key => $value)
{
  $options .= "<option value='" . $key . "'>" . $value. "</option>";
}
echo $options;
?>
