<p class="_p_article_headline"><?php echo $article->getHeadline(ESC_RAW) ?></p>
<p class="_p_article_date"><?php echo $article->getPublishedDate() ?></p>
<?php if($article->getImage()) echo image_tag('/uploads/news/tn_' . $article->getImage(), 'align=left vspace=10 hspace=10 width="140px" alt_title=' . $article->getHeadline()); ?>
<div class="_p_article_body"><?php echo nl2br($article->getBody(ESC_RAW)) ?></div>

<p><b><?php echo link_to('&laquo; '.__('back_to_news'), '@news_all')?></b></p>