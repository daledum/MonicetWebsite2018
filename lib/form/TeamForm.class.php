<?php

/**
 * Team form.
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
class TeamForm extends BaseTeamForm
{
	public static $type = array('investigador', 'consultor');
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('team');
    unset(
      $this['created_at'], $this['updated_at'], $this['slug']
    );
    
    $this->widgetSchema['photo'] = new sfWidgetFormInputFileEditable(array(
      'is_image' => true,
      'file_src' => sfConfig::get('sf_upload_dir').'/team/'.$this->getObject()->getPhoto(),
      'edit_mode' => ! $this->getObject()->isNew()
    ));
    $this->validatorSchema['photo'] = new sfValidatorFile(array(
      'required' => false,
      'path' => sfConfig::get('sf_upload_dir').'/team',
      'mime_categories' => 'web_images',
      'mime_type_guessers' => array(
        array(new sfValidatorFile(), 'guessFromMimeContentType'),
        array(new sfValidatorFile(), 'guessFromFileinfo'),
        array(new sfValidatorFile(), 'guessFromFileBinary'),
      )
    ));
    $this->validatorSchema['photo_delete'] = new sfValidatorPass();
    
    $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
      'choices' => array_combine(self::$type, self::$type),
      'multiple' => false,
      'expanded' => false
    ));
    $this->validatorSchema['type'] = new sfValidatorChoice(array(
      'choices' => self::$type
    ));
    
    $this->validatorSchema['link'] = new sfValidatorUrl(array(
      'required' => false
    ));
    
    $this->embedI18n(array('pt', 'en'));
  }
}