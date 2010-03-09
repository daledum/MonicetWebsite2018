<?php

/**
 * mfFormularioUtilizador filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasemfFormularioUtilizadorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('mf_formulario_utilizador_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'mfFormularioUtilizador';
  }

  public function getFields()
  {
    return array(
      'formulario_id' => 'ForeignKey',
      'utilizador_id' => 'ForeignKey',
    );
  }
}
