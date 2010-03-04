<h2><?php echo $element->getName(); ?></h2>
<?php if($element->getLink()): ?>
    <p><a href="<?php echo $element->getLink(); ?>" target="_blank"><?php echo $element->getLink() ?></a></p>
<?php endif ?>

<?php if($element->getLogotype()): ?>
    <?php echo image_tag('/uploads/consorcium/'.$element->getLogotype(), 'align=left vspace=5 hspace=5 alt_title='.$element->getName()) ?>
<?php endif ?>

<?php if($element->getDescription()): ?>
    <p class="content"><?php echo $element->getDescription(); ?></p>
<?php endif ?>