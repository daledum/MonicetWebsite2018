<h2><?php echo $element->getName(); ?></h2>
<?php if($element->getLogotype()): ?>
    <?php echo link_to_if($element->getLink(), image_tag('/uploads/consorcium/tn_'.$element->getLogotype(), 'align=left vspace=10 hspace=10 width=140px alt_title='.$element->getName()), $element->getLink()) ?>
<?php endif ?>
<br />
<?php if($element->getLink() && !$element->getLogotype()): ?>
    <p><a href="<?php echo $element->getLink(); ?>" target="_blank"><?php echo $element->getLink() ?></a></p>
<?php endif ?>
<?php if($element->getDescription()): ?>
    <div class="content"><?php echo $element->getDescription(ESC_RAW); ?></div>
<?php endif ?>