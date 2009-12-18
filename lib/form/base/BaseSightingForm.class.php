<?php

/**
 * Sighting form base class.
 *
 * @method Sighting getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSightingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'record_id'      => new sfWidgetFormPropelChoice(array('model' => 'Record', 'add_empty' => false)),
      'specie_id'      => new sfWidgetFormPropelChoice(array('model' => 'Specie', 'add_empty' => false)),
      'behaviour_id'   => new sfWidgetFormPropelChoice(array('model' => 'Behaviour', 'add_empty' => false)),
      'association_id' => new sfWidgetFormPropelChoice(array('model' => 'Association', 'add_empty' => false)),
      'adults'         => new sfWidgetFormInputText(),
      'juveniles'      => new sfWidgetFormInputText(),
      'cubs'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Sighting', 'column' => 'id', 'required' => false)),
      'record_id'      => new sfValidatorPropelChoice(array('model' => 'Record', 'column' => 'id')),
      'specie_id'      => new sfValidatorPropelChoice(array('model' => 'Specie', 'column' => 'id')),
      'behaviour_id'   => new sfValidatorPropelChoice(array('model' => 'Behaviour', 'column' => 'id')),
      'association_id' => new sfValidatorPropelChoice(array('model' => 'Association', 'column' => 'id')),
      'adults'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'juveniles'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'cubs'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('sighting[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sighting';
  }


}
