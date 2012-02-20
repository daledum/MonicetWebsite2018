<?php

/**
 * IndividualI18n filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseIndividualI18nFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'description1' => new sfWidgetFormFilterInput(),
      'description2' => new sfWidgetFormFilterInput(),
      'notes'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'description1' => new sfValidatorPass(array('required' => false)),
      'description2' => new sfValidatorPass(array('required' => false)),
      'notes'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('individual_i18n_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'IndividualI18n';
  }

  public function getFields()
  {
    return array(
      'id'           => 'ForeignKey',
      'culture'      => 'Text',
      'description1' => 'Text',
      'description2' => 'Text',
      'notes'        => 'Text',
    );
  }
}
