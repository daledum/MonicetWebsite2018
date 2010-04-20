<h3><?php echo __('Photo Albums') ?></h3>
<br />
<ul class="content albums">
    <?php foreach($pager->getResults() as $album): ?>
    <li><?php echo link_to($album->getName(), 'album', $album) ?> <span>(<?php echo $album->getPublishDate(); ?>)</span></li>
    <?php endforeach ?>
</ul>

<?php if ($pager->haveToPaginate()): ?>
  <p class="_p_news_pages_navigation">
  <?php echo link_to('&laquo; ' . __('first'), 'albums/index?page=' . $pager->getFirstPage()) ?>&nbsp;&nbsp;&nbsp;
  <?php echo link_to('&lt;', 'albums/index?page='.$pager->getPreviousPage()) ?>&nbsp;
  <?php $links = $pager->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'albums/index?page=' . $page) ?>
    <?php if ($page != $pager->getCurrentMaxLink()): ?> | <?php endif ?>
  <?php endforeach ?>
  &nbsp;<?php echo link_to('&gt;', 'albums/index?page='.$pager->getNextPage()) ?>&nbsp;&nbsp;&nbsp;
  <?php echo link_to(__('last') . ' &raquo;', 'albums/index?page='.$pager->getLastPage()) ?>
  </p>
<?php endif ?>