{
  "categories": [<?php foreach($categories as $c): ?><?php echo "\"".$c."\","; ?><?php endforeach; ?>],
  "series": [<?php foreach($series as $c => $d): ?><?php echo "{\"name\": \"".$c."\", \"data\": ["; ?><?php foreach($d as $i): ?><?php echo $i.","; ?><?php endforeach; ?><?php echo "]},"; ?><?php endforeach; ?>]
}