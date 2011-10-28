<?php

/**
 * WatchInfo form base class.
 *
 * @method WatchInfo getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseWatchInfoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'code'           => new sfWidgetFormInputText(),
      'watch_post_id'  => new sfWidgetFormPropelChoice(array('model' => 'WatchPost', 'add_empty' => true)),
      'watchman_id'    => new sfWidgetFormPropelChoice(array('model' => 'Watchman', 'add_empty' => true)),
      'company_id'     => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => false)),
      'base_latitude'  => new sfWidgetFormInputText(),
      'base_longitude' => new sfWidgetFormInputText(),
      'date'           => new sfWidgetFormDate(),
      'valid'          => new sfWidgetFormInputCheckbox(),
      'comments'       => new sfWidgetFormTextarea(),
      'created_by'     => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'updated_by'     => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'WatchInfo', 'column' => 'id', 'required' => false)),
      'code'           => new sfValidatorString(array('max_length' => 45)),
      'watch_post_id'  => new sfValidatorPropelChoice(array('model' => 'WatchPost', 'column' => 'id', 'required' => false)),
      'watchman_id'    => new sfValidatorPropelChoice(array('model' => 'Watchman', 'column' => 'id', 'required' => false)),
      'company_id'     => new sfValidatorPropelChoice(array('model' => 'Company', 'column' => 'id')),
      'base_latitude'  => new sfValidatorString(array('max_length' => 45)),
      'base_longitude' => new sfValidatorString(array('max_length' => 45)),
      'date'           => new sfValidatorDate(),
      'valid'          => new sfValidatorBoolean(),
      'comments'       => new sfValidatorString(array('required' => false)),
      'created_by'     => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'updated_by'     => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('watch_info[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WatchInfo';
  }


}
