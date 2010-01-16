<?php

/**
 * ConsorciumElement form base class.
 *
 * @method ConsorciumElement getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseConsorciumElementForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'logotype'   => new sfWidgetFormInputText(),
      'link'       => new sfWidgetFormInputText(),
      'slug'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'ConsorciumElement', 'column' => 'id', 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'logotype'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'link'       => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'slug'       => new sfValidatorString(array('max_length' => 255)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'ConsorciumElement', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('consorcium_element[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConsorciumElement';
  }

  public function getI18nModelName()
  {
    return 'ConsorciumElementI18n';
  }

  public function getI18nFormClass()
  {
    return 'ConsorciumElementI18nForm';
  }

}
