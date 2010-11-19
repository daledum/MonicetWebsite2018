<?php foreach($valores as $i => $v): ?>
<option value="<?php echo $i ?>" <?php if($i == $selected) echo 'selected="selected"' ?> ><?php echo $v ?></option>
<?php endforeach; ?>