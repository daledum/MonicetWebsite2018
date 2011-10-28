<?php

/**
 * WatchBehaviour form base class.
 *
 * @method WatchBehaviour getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseWatchBehaviourForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'code'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'WatchBehaviour', 'column' => 'id', 'required' => false)),
      'code'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'WatchBehaviour', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('watch_behaviour[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WatchBehaviour';
  }

  public function getI18nModelName()
  {
    return 'WatchBehaviourI18n';
  }

  public function getI18nFormClass()
  {
    return 'WatchBehaviourI18nForm';
  }

}
