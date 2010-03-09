<?php

/**
 * ProfileI18n filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseProfileI18nFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'type'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'about'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'type'    => new sfValidatorPass(array('required' => false)),
      'about'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('profile_i18n_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfileI18n';
  }

  public function getFields()
  {
    return array(
      'id'      => 'ForeignKey',
      'culture' => 'Text',
      'type'    => 'Text',
      'about'   => 'Text',
    );
  }
}
