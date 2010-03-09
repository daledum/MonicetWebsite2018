<?php

/**
 * NewsArticle form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class NewsArticleForm extends BaseNewsArticleForm
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('news_article');
    unset(
      $this['created_at'], $this['updated_at'], $this['slug']
    );
    $this->widgetSchema['enter_date']->setOption('format', '%year%-%month%-%day%');
    $this->widgetSchema['exit_date']->setOption('format', '%year%-%month%-%day%');
    $this->widgetSchema['publish_date']->setOption('format', '%year%-%month%-%day%');
    
    $this->embedI18n(array('pt', 'en'));
  }
}
