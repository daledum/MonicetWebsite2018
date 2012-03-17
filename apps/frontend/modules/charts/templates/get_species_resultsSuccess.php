<?php
    
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
    if ($counter > 0) {
        $results .= "]},";
        $counter--;
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