
<?php foreach ($exif as $key => $section): ?>
    <?php foreach ($section as $name => $val): ?>
        <?php if( in_array($name."", sfConfig::get('app_photoRepoPlugin_exif_enabledFields', array()) )): ?>
            <b><?php echo $key.".".$name ?></b>: <?php echo $val ?><br/>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>

<?php /* ?>
<br/>
<?php foreach ($exif as $key => $section): ?>
    <?php foreach ($section as $name => $val): ?>
        <b><?php echo $key.".".$name ?></b>: 
        <?php if (is_array($val)): ?>
           <?php print_r($val); ?>
        <?php else: ?>
          <?php echo $val ?><br/>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach ?>
<?php */ ?>