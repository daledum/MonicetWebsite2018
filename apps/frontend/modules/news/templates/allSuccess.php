<!-- 
<?php foreach($articles as $article): ?>
<p class="_p_article_headline"><?php echo link_to($article->getHeadline(), 'news/show?article=' . $article->getId()); ?></p>
<p class="_p_article_date"><?php echo $article->getUpdatedAt(); ?></p>
<p class="_p_article_body"><?php echo nl2br(substr($article->getBody(), 0, 300)) ?> ... <?php echo link_to(__('read more ') . ' &raquo;', 'news/show?article=' . $article->getId()); ?></p>
<br /><br />
<?php endforeach; ?>

-->

<?php foreach ($pager->getResults() as $article): ?>
<p class="_p_article_headline"><?php echo link_to($article->getHeadline(), 'news/show?article=' . $article->getId()); ?></p>
<p class="_p_article_date"><?php echo $article->getUpdatedAt(); ?></p>
<p class="_p_article_body"><?php echo nl2br(substr($article->getBody(), 0, 300)) ?> ... <?php echo link_to(__('read more ') . ' &raquo;', 'news/show?article=' . $article->getId()); ?></p>
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