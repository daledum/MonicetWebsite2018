<?php 
    $allowedFileds = array(
        '2#120' => 'Caption/Abstract',
        '2#080' => 'By-line',
        '2#090' => 'City',
        '2#095' => 'Province/State',
        '2#115' => 'Category',
        '2#116' => 'Copyright'
    ); 
?>


<?php foreach($iptc as $key => $value ): ?>
    <?php if( isset($allowedFileds[$key]) ): ?>
        <b><?php echo $allowedFileds[$key] ?></b>: <?php echo $value[0] ?><br/>
    <?php endif; ?>
<?php endforeach; ?>
