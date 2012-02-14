<?php

/**
 * ObservationPhotoMarkTail filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseObservationPhotoMarkTailFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'photo_id'    => new sfWidgetFormPropelChoice(array('model' => 'ObservationPhoto', 'add_empty' => true)),
      'mark_id'     => new sfWidgetFormPropelChoice(array('model' => 'Mark', 'add_empty' => true)),
      'line'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'column'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'observation' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'photo_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ObservationPhoto', 'column' => 'id')),
      'mark_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Mark', 'column' => 'id')),
      'line'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'column'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'observation' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('observation_photo_mark_tail_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationPhotoMarkTail';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'photo_id'    => 'ForeignKey',
      'mark_id'     => 'ForeignKey',
      'line'        => 'Number',
      'column'      => 'Number',
      'observation' => 'Text',
    );
  }
}
