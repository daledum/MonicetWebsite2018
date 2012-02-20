<?php

/**
 * IndividualI18n form base class.
 *
 * @method IndividualI18n getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseIndividualI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'culture'      => new sfWidgetFormInputHidden(),
      'description1' => new sfWidgetFormTextarea(),
      'description2' => new sfWidgetFormTextarea(),
      'notes'        => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Individual', 'column' => 'id', 'required' => false)),
      'culture'      => new sfValidatorPropelChoice(array('model' => 'IndividualI18n', 'column' => 'culture', 'required' => false)),
      'description1' => new sfValidatorString(array('required' => false)),
      'description2' => new sfValidatorString(array('required' => false)),
      'notes'        => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('individual_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'IndividualI18n';
  }


}
