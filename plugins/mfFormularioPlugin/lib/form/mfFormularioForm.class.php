<?php

/**
 * mfFormulario form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class mfFormularioForm extends BasemfFormularioForm
{
  public function configure()
  {
  	unset(
      $this['created_at']
    );
  	$this->validatorSchema['regra'] = new mfValidatorFormulario(array(
      'required' => true
    ));
  }
}
