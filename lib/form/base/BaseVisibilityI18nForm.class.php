<?php

/**
 * VisibilityI18n form base class.
 *
 * @method VisibilityI18n getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseVisibilityI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'culture'     => new sfWidgetFormInputHidden(),
      'description' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Visibility', 'column' => 'id', 'required' => false)),
      'culture'     => new sfValidatorPropelChoice(array('model' => 'VisibilityI18n', 'column' => 'culture', 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('visibility_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VisibilityI18n';
  }


}
