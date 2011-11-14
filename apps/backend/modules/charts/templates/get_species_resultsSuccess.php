<?php
    
  $selected = array(
    'Common dolphin (Dd)',
    'Golfinho comum (Dd)',
    'Sperm whale (Pm)',
    'Cachalote (Pm)',
    'Atlantic Spotted dolphin (Sf)',
    'Golfinho Pintado (Sf)',
    'Common bottlenose dolphin (Tt)',
    'Roaz (Tt)',
  );
    
  $cats = '';
  foreach($categories as $c): 
    $cats .= "\"".$c."\","; 
  endforeach;

  $results = '';
  foreach($series as $c => $d): 
    $results .= "{\"name\": \"".$c."\", \"data\": [";  
    foreach($d as $i):  
      $results .= $i.",";  
    endforeach;
    $results = substr($results, 0, -1);
    if (in_array($c, $selected)) {
        $results .= "]},";
    }
    else {
        $results .= "], \"visible\":false},";
    }
  endforeach;
?>
{
  "categories": [<?php echo substr($cats, 0, -1) ?>],
  "series": [<?php echo substr($results, 0, -1); ?>]
}