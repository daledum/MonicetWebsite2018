<?php

/**
 * ProfileI18n form base class.
 *
 * @method ProfileI18n getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseProfileI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'culture' => new sfWidgetFormInputHidden(),
      'type'    => new sfWidgetFormInputText(),
      'about'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorPropelChoice(array('model' => 'Profile', 'column' => 'id', 'required' => false)),
      'culture' => new sfValidatorPropelChoice(array('model' => 'ProfileI18n', 'column' => 'culture', 'required' => false)),
      'type'    => new sfValidatorString(array('max_length' => 255)),
      'about'   => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('profile_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfileI18n';
  }


}
