<?php

/**
 * NewsArticle filter form.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class NewsArticleFormFilter extends BaseNewsArticleFormFilter
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('news_article');
    unset(
      $this['created_at'], $this['updated_at']
    );
  }
}
