<?php

/**
 * ChartIframeInformation filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseChartIframeInformationFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'company_id' => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => true)),
      'hash'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'graph_type' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'year'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'chart_item' => new sfWidgetFormFilterInput(),
      'chart_type' => new sfWidgetFormFilterInput(),
      'selected'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'company_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Company', 'column' => 'id')),
      'hash'       => new sfValidatorPass(array('required' => false)),
      'graph_type' => new sfValidatorPass(array('required' => false)),
      'year'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'chart_item' => new sfValidatorPass(array('required' => false)),
      'chart_type' => new sfValidatorPass(array('required' => false)),
      'selected'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('chart_iframe_information_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ChartIframeInformation';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'company_id' => 'ForeignKey',
      'hash'       => 'Text',
      'graph_type' => 'Text',
      'year'       => 'Number',
      'chart_item' => 'Text',
      'chart_type' => 'Text',
      'selected'   => 'Text',
    );
  }
}
