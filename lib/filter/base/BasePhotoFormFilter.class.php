<?php

/**
 * Photo filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePhotoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'slug'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'album_id'   => new sfWidgetFormPropelChoice(array('model' => 'Album', 'add_empty' => true)),
      'image'      => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'slug'       => new sfValidatorPass(array('required' => false)),
      'album_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Album', 'column' => 'id')),
      'image'      => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Photo';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'slug'       => 'Text',
      'album_id'   => 'ForeignKey',
      'image'      => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
