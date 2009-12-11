<ul id="_ul_consorcium">
    <?php foreach($consorcium_elements as $element): ?>
    <li><?php echo link_to($element->getName(), 'consorcium/show?partner=' . $element->getId()); echo ($consorcium_elements[3] == $element)? "" : " | "; ?></li>
    <?php endforeach ?>
</ul>