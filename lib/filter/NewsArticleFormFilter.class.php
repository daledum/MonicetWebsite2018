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
      $this['created_at'], $this['updated_at'], $this['image'], $this['slug']
    );
    $this->widgetSchema['headline'] = new sfWidgetFormInputText();
    $this->validatorSchema['headline'] = new sfValidatorPass();
  }
  /*
   * adicionar novo campo para pesquisar na tabela i18n
   */
  public function getFields() {
    $fields = parent::getFields();
    $fields['headline'] = 'headline'; 
    return $fields;
  }
  /*
   * pesquisar na tabela i18n pelo campo headline
   */
  public function addHeadlineColumnCriteria($q, $element, $value) {
    if ( strlen($value) ){
    	return $q->addJoin(NewsArticlePeer::ID, NewsArticleI18nPeer::ID)->
    	  add(NewsArticleI18nPeer::HEADLINE, '%'.$value.'%', Criteria::LIKE)->
    	  setDistinct();
    }
  }
}