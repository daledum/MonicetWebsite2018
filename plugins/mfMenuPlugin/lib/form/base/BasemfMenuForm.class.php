<?php

/**
 * mfMenu form base class.
 *
 * @method mfMenu getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasemfMenuForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'nome'         => new sfWidgetFormInputText(),
      'menu_pai_id'  => new sfWidgetFormPropelChoice(array('model' => 'mfMenu', 'add_empty' => true)),
      'rota'         => new sfWidgetFormInputText(),
      'permissao_id' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardPermission', 'add_empty' => true)),
      'posicao'      => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'mfMenu', 'column' => 'id', 'required' => false)),
      'nome'         => new sfValidatorString(array('max_length' => 255)),
      'menu_pai_id'  => new sfValidatorPropelChoice(array('model' => 'mfMenu', 'column' => 'id', 'required' => false)),
      'rota'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'permissao_id' => new sfValidatorPropelChoice(array('model' => 'sfGuardPermission', 'column' => 'id', 'required' => false)),
      'posicao'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mf_menu[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'mfMenu';
  }


}
