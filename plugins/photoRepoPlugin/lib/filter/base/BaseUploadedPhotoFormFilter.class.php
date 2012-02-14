<?php

/**
 * UploadedPhoto filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseUploadedPhotoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'uploader_name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'uploader_email' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'photo_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'photo'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comment'        => new sfWidgetFormFilterInput(),
      'processed'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'uploader_name'  => new sfValidatorPass(array('required' => false)),
      'uploader_email' => new sfValidatorPass(array('required' => false)),
      'photo_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'photo'          => new sfValidatorPass(array('required' => false)),
      'comment'        => new sfValidatorPass(array('required' => false)),
      'processed'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('uploaded_photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UploadedPhoto';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'uploader_name'  => 'Text',
      'uploader_email' => 'Text',
      'photo_date'     => 'Date',
      'photo'          => 'Text',
      'comment'        => 'Text',
      'processed'      => 'Boolean',
      'created_at'     => 'Date',
    );
  }
}
