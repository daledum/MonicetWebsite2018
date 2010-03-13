<p class="_p_article_headline"><?php echo $article->getHeadline() ?></p>
<p class="_p_article_date"><?php echo $article->getUpdatedAt() ?></p>
<?php if($article->getImage()) echo image_tag('/uploads/news/' . $article->getImage(), 'align=left vspace=10 hspace=10 width="140px" alt_title=' . $article->getHeadline()); ?>
<span class="_p_article_body"><?php echo nl2br($article->getBody(ESC_RAW)) ?></span>

<p><b><?php echo link_to('&laquo; '.__('back_to_news'), '@news_all')?></b></p>