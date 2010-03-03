<?php

/**
 * mfFormularioUtilizador form base class.
 *
 * @method mfFormularioUtilizador getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasemfFormularioUtilizadorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'formulario_id' => new sfWidgetFormInputHidden(),
      'utilizador_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'formulario_id' => new sfValidatorPropelChoice(array('model' => 'mfFormulario', 'column' => 'id', 'required' => false)),
      'utilizador_id' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mf_formulario_utilizador[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'mfFormularioUtilizador';
  }


}
