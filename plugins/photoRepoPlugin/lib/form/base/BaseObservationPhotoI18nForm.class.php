<?php

/**
 * ObservationPhotoI18n form base class.
 *
 * @method ObservationPhotoI18n getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseObservationPhotoI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'culture'  => new sfWidgetFormInputHidden(),
      'legend'   => new sfWidgetFormInputText(),
      'comments' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorPropelChoice(array('model' => 'ObservationPhoto', 'column' => 'id', 'required' => false)),
      'culture'  => new sfValidatorPropelChoice(array('model' => 'ObservationPhotoI18n', 'column' => 'culture', 'required' => false)),
      'legend'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'comments' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('observation_photo_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationPhotoI18n';
  }


}
