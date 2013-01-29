<?php 
    $allowedFileds = array(
        '2#005' => 'IPTC.Title', #parte do corpo
        '2#120' => 'IPTC.Legend',#empresa
        '2#080' => 'IPTC.By-line',#fotografo
        '2#090' => 'IPTC.City',#latitude
        '2#095' => 'IPTC.Province/State',#longitude
        '2#015' => 'IPTC.Category',#especie
        '2#115' => 'IPTC.Category',
        '2#116' => 'IPTC.Copyright',
        
    ); 
?>


<?php foreach($iptc as $key => $value ): ?>
    <?php if( isset($allowedFileds[$key]) ): ?>
        <b><?php echo $allowedFileds[$key] ?></b>: <?php echo $value[0] ?><br/>
    <?php /*else: ?>
        <b><?php echo $key ?></b>: <?php echo $value[0] ?><br/>
    <?php */endif; ?>
<?php endforeach; ?>
