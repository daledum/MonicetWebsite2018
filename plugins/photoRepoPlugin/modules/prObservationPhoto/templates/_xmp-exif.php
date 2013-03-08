
<?php
  print "<ul>";
    foreach ($xmp_exif as $key => $k) {
        $item         = $k["item"];
        $value         = $k["value"];
        print "<li><b>" . $item . ":</b> " . $value . "</li>";
    }
  print "</ul>";
?>