<?php

/**
 * UploadedPhoto form base class.
 *
 * @method UploadedPhoto getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseUploadedPhotoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'uploader_name'  => new sfWidgetFormInputText(),
      'uploader_email' => new sfWidgetFormInputText(),
      'photo_date'     => new sfWidgetFormDate(),
      'photo'          => new sfWidgetFormInputText(),
      'comment'        => new sfWidgetFormTextarea(),
      'processed'      => new sfWidgetFormInputCheckbox(),
      'created_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'UploadedPhoto', 'column' => 'id', 'required' => false)),
      'uploader_name'  => new sfValidatorString(array('max_length' => 255)),
      'uploader_email' => new sfValidatorString(array('max_length' => 255)),
      'photo_date'     => new sfValidatorDate(array('required' => false)),
      'photo'          => new sfValidatorString(array('max_length' => 255)),
      'comment'        => new sfValidatorString(array('required' => false)),
      'processed'      => new sfValidatorBoolean(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('uploaded_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UploadedPhoto';
  }


}
