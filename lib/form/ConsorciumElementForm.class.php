<?php

/**
 * ConsorciumElement form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ConsorciumElementForm extends BaseConsorciumElementForm
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('consorcium_element');
    unset(
      $this['created_at'], $this['updated_at'], $this['slug']
    );
    
    $this->widgetSchema['logotype'] = new sfWidgetFormInputFileEditable(array(
      'is_image' => true,
      'file_src' => '/uploads/consorcium/'.$this->getObject()->getLogotype(),
      'edit_mode' => ! $this->getObject()->isNew()
    ));
    $this->validatorSchema['logotype'] = new sfValidatorFile(array(
      'required' => false,
      'path' => sfConfig::get('sf_upload_dir').'/consorcium',
      'mime_categories' => 'web_images',
      'mime_type_guessers' => array(
        array($this->getValue('logotype') ? $this->getValue('logotype') : new sfValidatorFile(), 'guessFromMimeContentType'),
	    array($this->getValue('logotype') ? $this->getValue('logotype') : new sfValidatorFile(), 'guessFromFileinfo'),
	    array($this->getValue('logotype') ? $this->getValue('logotype') : new sfValidatorFile(), 'guessFromFileBinary'),
      )
    ));
    $this->validatorSchema['logotype_delete'] = new sfValidatorPass();
    
    $this->validatorSchema['link'] = new sfValidatorUrl();
    
    $this->embedI18n(array('pt', 'en'));
  }
}
