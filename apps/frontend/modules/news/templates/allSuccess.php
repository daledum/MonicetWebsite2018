<?php foreach ($pager->getResults() as $article): ?>
<p class="_p_article_headline"><?php echo link_to($article->getHeadline(), 'news', $article); ?></p>
<p class="_p_article_date"><?php echo $article->getPublishDate(); ?></p>
<?php if($article->getImage()): ?>
    <?php echo image_tag('/uploads/news/tn_'.$article->getImage(), 'align=left vspace=5 hspace=5 alt_title=' . $article->getHeadline()); ?>
<?php endif ?>
<div class="content">
<?php echo substr($article->getBody(ESC_RAW), 0, 300) ?> ... <strong><?php echo link_to(__('read more ') . ' &raquo;', 'news', $article); ?></strong>
</div>
<br /><br />
<?php endforeach ?>

<?php if ($pager->haveToPaginate()): ?>
  <p class="_p_news_pages_navigation">
  <?php echo link_to('&laquo; ' . __('first'), 'news/all?page=' . $pager->getFirstPage()) ?>&nbsp;&nbsp;&nbsp;
  <?php echo link_to('&lt;', 'news/all?page='.$pager->getPreviousPage()) ?>&nbsp;
  <?php $links = $pager->getLinks(); foreach ($links as $page): ?>
    <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'news/all?page=' . $page) ?>
    <?php if ($page != $pager->getCurrentMaxLink()): ?> | <?php endif ?>
  <?php endforeach ?>
  &nbsp;<?php echo link_to('&gt;', 'news/all?page='.$pager->getNextPage()) ?>&nbsp;&nbsp;&nbsp;
  <?php echo link_to(__('last') . ' &raquo;', 'news/all?page='.$pager->getLastPage()) ?>
  </p>
<?php endif ?>