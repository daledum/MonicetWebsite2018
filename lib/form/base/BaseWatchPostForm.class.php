<?php

/**
 * WatchPost form base class.
 *
 * @method WatchPost getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseWatchPostForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'company_id'   => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => false)),
      'name'         => new sfWidgetFormInputText(),
      'latitude'     => new sfWidgetFormInputText(),
      'longitude'    => new sfWidgetFormInputText(),
      'height'       => new sfWidgetFormInputText(),
      'observations' => new sfWidgetFormTextarea(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'WatchPost', 'column' => 'id', 'required' => false)),
      'company_id'   => new sfValidatorPropelChoice(array('model' => 'Company', 'column' => 'id')),
      'name'         => new sfValidatorString(array('max_length' => 255)),
      'latitude'     => new sfValidatorString(array('max_length' => 45)),
      'longitude'    => new sfValidatorString(array('max_length' => 45)),
      'height'       => new sfValidatorNumber(array('required' => false)),
      'observations' => new sfValidatorString(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('watch_post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'WatchPost';
  }


}
