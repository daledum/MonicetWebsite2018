<?php

/**
 * SpecieGroupI18n form base class.
 *
 * @method SpecieGroupI18n getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSpecieGroupI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'culture' => new sfWidgetFormInputHidden(),
      'name'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorPropelChoice(array('model' => 'SpecieGroup', 'column' => 'id', 'required' => false)),
      'culture' => new sfValidatorPropelChoice(array('model' => 'SpecieGroupI18n', 'column' => 'culture', 'required' => false)),
      'name'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('specie_group_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SpecieGroupI18n';
  }


}
