<?php

/**
 * ObservationPhotoTail filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseObservationPhotoTailFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'photo_id'     => new sfWidgetFormPropelChoice(array('model' => 'ObservationPhoto', 'add_empty' => true)),
      'is_smooth'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_irregular' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'photo_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ObservationPhoto', 'column' => 'id')),
      'is_smooth'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_irregular' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('observation_photo_tail_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationPhotoTail';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'photo_id'     => 'ForeignKey',
      'is_smooth'    => 'Boolean',
      'is_irregular' => 'Boolean',
    );
  }
}
