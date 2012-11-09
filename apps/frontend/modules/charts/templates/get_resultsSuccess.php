<?php

$cats = '';
foreach ($categories as $c) {
    $cats .= "\"$c\",";
};

$colrs = '';
foreach ($colors as $c) {
    $colrs .= "\"$c\",";
}

$results = '';
foreach ($series as $c => $d) {
    $results .= "{\"name\": \"$c\", \"data\": [";

    foreach ($d as $i) {
        $results .= $i.",";
    }

    $results = substr($results, 0, -1);
    if ($counter > 0) {
        $results .= "]},";
        $counter --;
    }
    else {
        $results .= "], \"visible\":false},";
    }
};
?>
{
  "categories": [<?php echo substr($cats, 0, -1) ?>],
  "series": [<?php echo substr($results, 0, -1); ?>],
  "colors": [<?php echo substr($colrs, 0, -1); ?>]
}
