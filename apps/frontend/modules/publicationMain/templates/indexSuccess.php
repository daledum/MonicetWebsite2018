<h3><?php echo __('Publications') ?></h3>
<br />
<ul class="content albums">
    <?php foreach($pager->getResults() as $publication): ?>
    <li>
      <?php echo link_to($publication->getTitle($sf_user->getCulture()), '/uploads/publication/'.$publication->getFileAddress(), array('target' => '_blank') ) ?>
      <br/>
      <?php echo $publication->getDescription($sf_user->getCulture()) ?>
    </li>
    <?php endforeach ?>
</ul>

<?php if ($pager->haveToPaginate()): ?>
  <p class="_p_news_pages_navigation">
  <?php echo link_to('&laquo; ' . __('first'), 'publications/index?page=' . $pager->getFirstPage()) ?>&nbsp;&nbsp;&nbsp;
  <?php echo link_to('&lt;', 'publications/index?page='.$pager->getPreviousPage()) ?>&nbsp;
  <?php $links = $pager->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'publications/index?page=' . $page) ?>
    <?php if ($page != $pager->getCurrentMaxLink()): ?> | <?php endif ?>
  <?php endforeach ?>
  &nbsp;<?php echo link_to('&gt;', 'publications/index?page='.$pager->getNextPage()) ?>&nbsp;&nbsp;&nbsp;
  <?php echo link_to(__('last') . ' &raquo;', 'publications/index?page='.$pager->getLastPage()) ?>
  </p>
<?php endif ?>