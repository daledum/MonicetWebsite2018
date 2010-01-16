<ul id="_ul_consorcium">
    <?php foreach($consorcium_elements as $element): ?>
    <li><?php echo link_to($element->getName(), 'consorcium', $element); echo ($consorcium_elements[count($consorcium_elements) - 1] == $element)? "" : " | "; ?></li>
    <?php endforeach ?>
</ul>