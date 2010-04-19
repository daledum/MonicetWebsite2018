<h3><?php echo __('Album') . ' - ' . $album->getName() ?></h3>
<br />
<p><strong><?php echo link_to('&laquo; '.__('back_to_albums'), '@album_all')?></strong></p>
<br />
<ul class="gallery">
<?php foreach ($album->getPhotos() as $photo): ?>
    <li><a href="/uploads/photoalbums/<?php echo $photo->getImage(); ?>"><img class="tumb" src="/uploads/photoalbums/<?php echo $photo->getImage(); ?>" width="60px" height="60px" alt="<?php echo $photo->getCaption(); ?>" /></a></li>
<?php endforeach ?>
</ul>