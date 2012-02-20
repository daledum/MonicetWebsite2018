<?php

/**
 * Pattern form base class.
 *
 * @method Pattern getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasePatternForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'specie_id'            => new sfWidgetFormPropelChoice(array('model' => 'Specie', 'add_empty' => true)),
      'image_tail'           => new sfWidgetFormInputText(),
      'lines_tail'           => new sfWidgetFormInputText(),
      'columns_tail'         => new sfWidgetFormInputText(),
      'image_dorsal_left'    => new sfWidgetFormInputText(),
      'lines_dorsal_left'    => new sfWidgetFormInputText(),
      'columns_dorsal_left'  => new sfWidgetFormInputText(),
      'image_dorsal_right'   => new sfWidgetFormInputText(),
      'lines_dorsal_right'   => new sfWidgetFormInputText(),
      'columns_dorsal_right' => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Pattern', 'column' => 'id', 'required' => false)),
      'specie_id'            => new sfValidatorPropelChoice(array('model' => 'Specie', 'column' => 'id', 'required' => false)),
      'image_tail'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lines_tail'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'columns_tail'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'image_dorsal_left'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lines_dorsal_left'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'columns_dorsal_left'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'image_dorsal_right'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lines_dorsal_right'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'columns_dorsal_right' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'created_at'           => new sfValidatorDateTime(array('required' => false)),
      'updated_at'           => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pattern[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pattern';
  }


}
