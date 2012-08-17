<?php

/**
 * ObservationPhotoDorsalRight form base class.
 *
 * @method ObservationPhotoDorsalRight getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseObservationPhotoDorsalRightForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'photo_id'        => new sfWidgetFormPropelChoice(array('model' => 'ObservationPhoto', 'add_empty' => false)),
      'is_smooth'       => new sfWidgetFormInputCheckbox(),
      'is_irregular'    => new sfWidgetFormInputCheckbox(),
      'is_cutted_point' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'ObservationPhotoDorsalRight', 'column' => 'id', 'required' => false)),
      'photo_id'        => new sfValidatorPropelChoice(array('model' => 'ObservationPhoto', 'column' => 'id')),
      'is_smooth'       => new sfValidatorBoolean(array('required' => false)),
      'is_irregular'    => new sfValidatorBoolean(array('required' => false)),
      'is_cutted_point' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('observation_photo_dorsal_right[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationPhotoDorsalRight';
  }


}
