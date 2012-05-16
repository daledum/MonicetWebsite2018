<?php

/**
 * ChartIframeInformation form base class.
 *
 * @method ChartIframeInformation getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseChartIframeInformationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'company_id' => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => false)),
      'hash'       => new sfWidgetFormInputText(),
      'graph_type' => new sfWidgetFormInputText(),
      'year'       => new sfWidgetFormInputText(),
      'month'      => new sfWidgetFormInputText(),
      'chart_item' => new sfWidgetFormInputText(),
      'chart_type' => new sfWidgetFormInputText(),
      'selected'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'ChartIframeInformation', 'column' => 'id', 'required' => false)),
      'company_id' => new sfValidatorPropelChoice(array('model' => 'Company', 'column' => 'id')),
      'hash'       => new sfValidatorString(array('max_length' => 10)),
      'graph_type' => new sfValidatorString(array('max_length' => 10)),
      'year'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'month'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'chart_item' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'chart_type' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'selected'   => new sfValidatorString(array('max_length' => 10)),
    ));

    $this->widgetSchema->setNameFormat('chart_iframe_information[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ChartIframeInformation';
  }


}
