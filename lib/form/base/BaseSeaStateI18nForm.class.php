<?php

/**
 * SeaStateI18n form base class.
 *
 * @method SeaStateI18n getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSeaStateI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'culture'     => new sfWidgetFormInputHidden(),
      'description' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'SeaState', 'column' => 'id', 'required' => false)),
      'culture'     => new sfValidatorPropelChoice(array('model' => 'SeaStateI18n', 'column' => 'culture', 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sea_state_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SeaStateI18n';
  }


}
