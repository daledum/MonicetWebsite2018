<?php

/**
 * ObservationPhotoDorsalLeft form base class.
 *
 * @method ObservationPhotoDorsalLeft getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseObservationPhotoDorsalLeftForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'photo_id'     => new sfWidgetFormPropelChoice(array('model' => 'ObservationPhoto', 'add_empty' => false)),
      'is_smooth'    => new sfWidgetFormInputCheckbox(),
      'is_irregular' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'ObservationPhotoDorsalLeft', 'column' => 'id', 'required' => false)),
      'photo_id'     => new sfValidatorPropelChoice(array('model' => 'ObservationPhoto', 'column' => 'id')),
      'is_smooth'    => new sfValidatorBoolean(array('required' => false)),
      'is_irregular' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('observation_photo_dorsal_left[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationPhotoDorsalLeft';
  }


}
