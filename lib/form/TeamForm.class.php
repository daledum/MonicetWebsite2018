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
      'file_src' => '/uploads/team/tn_'.$this->getObject()->getPhoto(),
      'edit_mode' => ! $this->getObject()->isNew()
    ));
    $this->validatorSchema['photo'] = new sfValidatorFile(array(
      'required' => false,
      'path' => sfConfig::get('sf_upload_dir').'/team',
      'mime_categories' => 'web_images',
      'mime_type_guessers' => array(
        array($this->getValue('image') ? $this->getValue('image') : new sfValidatorFile(), 'guessFromMimeContentType'),
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