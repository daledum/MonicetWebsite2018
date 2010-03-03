<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'user_id'      => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'name'         => new sfWidgetFormInputText(),
      'lastname'     => new sfWidgetFormInputText(),
      'birthday'     => new sfWidgetFormDate(),
      'bi'           => new sfWidgetFormInputText(),
      'nif'          => new sfWidgetFormInputText(),
      'country'      => new sfWidgetFormInputText(),
      'island'       => new sfWidgetFormInputText(),
      'county'       => new sfWidgetFormInputText(),
      'locality'     => new sfWidgetFormInputText(),
      'address'      => new sfWidgetFormInputText(),
      'zipcode'      => new sfWidgetFormInputText(),
      'telephone'    => new sfWidgetFormInputText(),
      'mobile'       => new sfWidgetFormInputText(),
      'email'        => new sfWidgetFormInputText(),
      'url'          => new sfWidgetFormInputText(),
      'lang'         => new sfWidgetFormInputText(),
      'photo'        => new sfWidgetFormInputText(),
      'situation'    => new sfWidgetFormInputText(),
      'observations' => new sfWidgetFormTextarea(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id', 'required' => false)),
      'user_id'      => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'name'         => new sfValidatorString(array('max_length' => 255)),
      'lastname'     => new sfValidatorString(array('max_length' => 255)),
      'birthday'     => new sfValidatorDate(array('required' => false)),
      'bi'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'nif'          => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'country'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'island'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'county'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'locality'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'zipcode'      => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'telephone'    => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'mobile'       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'email'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'url'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lang'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'photo'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'situation'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'observations' => new sfValidatorString(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }


}
