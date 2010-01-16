<h2><?php echo $element->getName(); ?></h2>
<br />

<?php if($element->getLogotype()): ?>
    <img title="<?php echo $element->getName(); ?>" alt="<?php echo $element->getName(); ?>" src="/images/consorcium/<?php echo $element->getLogotype(); ?>" />
    <br />
    <br />
<?php endif ?>

<?php if($element->getLink()): ?>
    <a href="<?php echo $element->getLink(); ?>"><?php echo $element->getLink(); ?></a>
    <br />
<?php endif ?>

<?php if($element->getDescription()): ?>
    <p class="content"><?php echo $element->getDescription(); ?></p>
<?php endif ?>