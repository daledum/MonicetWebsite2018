<?php

/**
 * SpecieI18n form base class.
 *
 * @method SpecieI18n getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSpecieI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'culture' => new sfWidgetFormInputHidden(),
      'name'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorPropelChoice(array('model' => 'Specie', 'column' => 'id', 'required' => false)),
      'culture' => new sfValidatorPropelChoice(array('model' => 'SpecieI18n', 'column' => 'culture', 'required' => false)),
      'name'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('specie_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SpecieI18n';
  }


}
