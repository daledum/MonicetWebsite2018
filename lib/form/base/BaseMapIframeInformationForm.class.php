<?php

/**
 * MapIframeInformation form base class.
 *
 * @method MapIframeInformation getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseMapIframeInformationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'hash'       => new sfWidgetFormInputText(),
      'company_id' => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'MapIframeInformation', 'column' => 'id', 'required' => false)),
      'hash'       => new sfValidatorString(array('max_length' => 10)),
      'company_id' => new sfValidatorPropelChoice(array('model' => 'Company', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('map_iframe_information[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MapIframeInformation';
  }


}
