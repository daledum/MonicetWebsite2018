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
    
    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
      'is_image' => true,
      'file_src' => '/uploads/news/tn_'.$this->getObject()->getImage(),
      'edit_mode' => ! $this->getObject()->isNew()
    ));
    $this->validatorSchema['image'] = new sfValidatorFile(array(
      'required' => false,
      'path' => sfConfig::get('sf_upload_dir').'/news',
      'mime_categories' => 'web_images',
      'mime_type_guessers' => array(
        array($this->getValue('image') ? $this->getValue('image') : new sfValidatorFile(), 'guessFromMimeContentType'),
      )
    ));
    $this->validatorSchema['image_delete'] = new sfValidatorPass();
    
    if( $this->getObject()->isNew() ){
    	$this->setDefaults(array(
    	  'publish_date' => time()
    	));
    }

    $this->embedI18n(array('pt', 'en'));
  }
}
