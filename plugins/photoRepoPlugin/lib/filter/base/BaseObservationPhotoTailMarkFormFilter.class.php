<?php

/**
 * ObservationPhotoTailMark filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseObservationPhotoTailMarkFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'observation_photo_tail_id' => new sfWidgetFormPropelChoice(array('model' => 'ObservationPhotoTail', 'add_empty' => true)),
      'mark_id'                   => new sfWidgetFormPropelChoice(array('model' => 'Mark', 'add_empty' => true)),
      'line'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'column'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'observation'               => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'observation_photo_tail_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ObservationPhotoTail', 'column' => 'id')),
      'mark_id'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Mark', 'column' => 'id')),
      'line'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'column'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'observation'               => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('observation_photo_tail_mark_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationPhotoTailMark';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'observation_photo_tail_id' => 'ForeignKey',
      'mark_id'                   => 'ForeignKey',
      'line'                      => 'Number',
      'column'                    => 'Number',
      'observation'               => 'Text',
    );
  }
}
