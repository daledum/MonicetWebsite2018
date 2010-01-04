<h2><?php echo __('Consorcium'); ?></h2>
<ul class="content">
    <?php foreach($consorcium_elements as $element): ?>
    <li><?php echo link_to($element->getName(), 'consorcium', $element); ?></li>
    <?php endforeach ?>
</ul>