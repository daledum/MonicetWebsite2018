<?php

/**
 * WatchSighting form base class.
 *
 * @method WatchSighting getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseWatchSightingForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'watch_info_id'       => new sfWidgetFormPropelChoice(array('model' => 'WatchInfo', 'add_empty' => false)),
      'watch_code_id'       => new sfWidgetFormPropelChoice(array('model' => 'WatchCode', 'add_empty' => false)),
      'time'                => new sfWidgetFormTime(),
      'watch_visibility_id' => new sfWidgetFormPropelChoice(array('model' => 'WatchVisibility', 'add_empty' => true)),
      'specie_id'           => new sfWidgetFormPropelChoice(array('model' => 'Specie', 'add_empty' => true)),
      'group'               => new sfWidgetFormInputText(),
      'total'               => new sfWidgetFormInputText(),
      'behaviour_id'        => new sfWidgetFormPropelChoice(array('model' => 'Behaviour', 'add_empty' => true)),
      'direction_id'        => new sfWidgetFormPropelChoice(array('model' => 'Direction', 'add_empty' => true)),
      'horizontal'          => new sfWidgetFormInputText(),
      'vertical'            => new sfWidgetFormInputText(),
      'vessel_id'           => new sfWidgetFormPropelChoice(array('model' => 'Vessel', 'add_empty' => true)),
      'comments'            => new sfWidgetFormTextarea(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorPropelChoice(array('model' => 'WatchSighting', 'column' => 'id', 'required' => false)),
      'watch_info_id'       => new sfValidatorPropelChoice(array('model' => 'WatchInfo', 'column' => 'id')),
      'watch_code_id'       => new sfValidatorPropelChoice(array('model' => 'WatchCode', 'column' => 'id')),
      'time'                => new sfValidatorTime(),
      'watch_visibility_id' => new sfValidatorPropelChoice(array('model' => 'WatchVisibility', 'column' => 'id', 'required' => false)),
      'specie_id'           => new sfValidatorPropelChoice(array('model' => 'Specie', 'column' => 'id', 'required' => false)),
      'group'               => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'total'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'behaviour_id'        => new sfValidatorPropelChoice(array('model' => 'Behaviour', 'column' => 'id', 'required' => false)),
      'direction_id'        => new sfValidatorPropelChoice(array('model' => 'Direction', 'column' => 'id', 'required' => false)),
      'horizontal'          => new sfValidatorNumber(array('required' => false)),
      'vertical'            => new sfValidatorNumber(array('required' => false)),
      'vessel_id'           => new sfValidatorPropelChoice(array('model' => 'Vessel', 'column' => 'id', 'required' => false)),
      'comments'            => new sfValidatorString(array('required' => false)),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
      'updated_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('watch_sighting[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WatchSighting';
  }


}
