<?php

$cats = '';
foreach ($categories as $c) {
    $cats .= "\"$c\",";
};

$colrs = '';
foreach ($colors as $c) {
    $colrs .= "\"$c\",";
}

//define series to display by default
$unOrderedSeries = array();
foreach ($series as $c => $d) {
    $total = 0;
    foreach ($d as $i) {
        $total += $i;
    }
    $unOrderedSeries[$c] = $total;
};
arsort($unOrderedSeries);
$seriesToShow = array_slice($unOrderedSeries,0 , $counter);

$results = '';
foreach ($series as $c => $d) {
    $results .= "{\"name\": \"$c\", \"data\": [";

    foreach ($d as $i) {
        $results .= $i.",";
    }

    $results = substr($results, 0, -1);
    
    if( isset($seriesToShow[$c]) ){
      $results .= "]},";
    } else {
        $results .= "], \"visible\":false},";
    }
};

?>
{
  "categories": [<?php echo substr($cats, 0, -1) ?>],
  "series": [<?php echo substr($results, 0, -1); ?>],
  "colors": [<?php echo substr($colrs, 0, -1); ?>]
}
