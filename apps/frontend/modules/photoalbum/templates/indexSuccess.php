<h3><?php echo __('Photo Albums') ?></h3>
<ul class="content">
    <?php foreach($albums as $album): ?>
    <li><?php echo link_to($album->getName(), 'photoalbum', $album) ?></li>
    <?php endforeach ?>
</ul>