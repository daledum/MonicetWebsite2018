<?php

/**
 * MapIframeInformation filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseMapIframeInformationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'hash'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'company_id' => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'hash'       => new sfValidatorPass(array('required' => false)),
      'company_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Company', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('map_iframe_information_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MapIframeInformation';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'hash'       => 'Text',
      'company_id' => 'ForeignKey',
    );
  }
}
