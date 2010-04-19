<?php

/**
 * Photo form base class.
 *
 * @method Photo getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePhotoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'slug'       => new sfWidgetFormInputText(),
      'album_id'   => new sfWidgetFormPropelChoice(array('model' => 'Album', 'add_empty' => false)),
      'image'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Photo', 'column' => 'id', 'required' => false)),
      'slug'       => new sfValidatorString(array('max_length' => 255)),
      'album_id'   => new sfValidatorPropelChoice(array('model' => 'Album', 'column' => 'id')),
      'image'      => new sfValidatorString(array('max_length' => 1024, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Photo', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Photo';
  }

  public function getI18nModelName()
  {
    return 'PhotoI18n';
  }

  public function getI18nFormClass()
  {
    return 'PhotoI18nForm';
  }

}
