<h2><?php echo $element->getName(); ?></h2>
<br />
<?php if($element->getPhoto()): ?>
    <?php echo image_tag('/uploads/profile/'.$element->getPhoto(), 'align=left vspace=5 hspace=5 alt_title='.$element->getName()) ?>
<?php endif ?>
<?php if($element->getLink()): ?>
    <br /><br />
    <a href="<?php echo $element->getLink(); ?>"><?php echo $element->getLink(); ?></a>
<?php endif ?>
<?php if($element->getAbout()): ?>
    <br /><br />
    <p class="content"><?php echo $element->getAbout(); ?></p>
<?php endif ?>