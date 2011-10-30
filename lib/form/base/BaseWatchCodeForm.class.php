<?php

/**
 * WatchCode form base class.
 *
 * @method WatchCode getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseWatchCodeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'acronym'    => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'WatchCode', 'column' => 'id', 'required' => false)),
      'acronym'    => new sfValidatorString(array('max_length' => 10)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('watch_code[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WatchCode';
  }

  public function getI18nModelName()
  {
    return 'WatchCodeI18n';
  }

  public function getI18nFormClass()
  {
    return 'WatchCodeI18nForm';
  }

}
