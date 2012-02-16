<?php

/**
 * ObservationPhotoI18n filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseObservationPhotoI18nFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'legend'   => new sfWidgetFormFilterInput(),
      'comments' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'legend'   => new sfValidatorPass(array('required' => false)),
      'comments' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('observation_photo_i18n_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationPhotoI18n';
  }

  public function getFields()
  {
    return array(
      'id'       => 'ForeignKey',
      'culture'  => 'Text',
      'legend'   => 'Text',
      'comments' => 'Text',
    );
  }
}
