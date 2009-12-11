<?php if($element->getLogotype()): ?>
    <img title="<?php echo $element->getName(); ?>" alt="<?php echo $element->getName(); ?>" src="/images/consorcium/<?php echo $element->getLogotype(); ?>" />
<?php endif ?>

<p><?php echo $element->getName(); ?></p>

<?php if($element->getLink()): ?>
    <p><a href="<?php echo $element->getLink(); ?>"><?php echo $element->getLink(); ?></a></p>
<?php endif ?>

<p>description...</p>