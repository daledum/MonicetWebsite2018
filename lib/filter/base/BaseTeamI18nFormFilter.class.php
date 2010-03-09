<?php

/**
 * TeamI18n filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTeamI18nFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'about'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'about'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('team_i18n_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TeamI18n';
  }

  public function getFields()
  {
    return array(
      'id'      => 'ForeignKey',
      'culture' => 'Text',
      'about'   => 'Text',
    );
  }
}
