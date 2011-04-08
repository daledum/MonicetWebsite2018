<?php

/**
 * BehaviourI18n form base class.
 *
 * @method BehaviourI18n getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseBehaviourI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'culture'     => new sfWidgetFormInputHidden(),
      'description' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Behaviour', 'column' => 'id', 'required' => false)),
      'culture'     => new sfValidatorPropelChoice(array('model' => 'BehaviourI18n', 'column' => 'culture', 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('behaviour_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BehaviourI18n';
  }


}
