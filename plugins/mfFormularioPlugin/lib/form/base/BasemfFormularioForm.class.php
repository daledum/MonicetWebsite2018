<?php

/**
 * mfFormulario form base class.
 *
 * @method mfFormulario getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BasemfFormularioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'regra'                         => new sfWidgetFormInputText(),
      'visivel'                       => new sfWidgetFormInputCheckbox(),
      'ao_editar'                     => new sfWidgetFormInputCheckbox(),
      'ao_criar'                      => new sfWidgetFormInputCheckbox(),
      'observacoes'                   => new sfWidgetFormTextarea(),
      'created_at'                    => new sfWidgetFormDateTime(),
      'mf_formulario_utilizador_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorPropelChoice(array('model' => 'mfFormulario', 'column' => 'id', 'required' => false)),
      'regra'                         => new sfValidatorString(array('max_length' => 255)),
      'visivel'                       => new sfValidatorBoolean(array('required' => false)),
      'ao_editar'                     => new sfValidatorBoolean(array('required' => false)),
      'ao_criar'                      => new sfValidatorBoolean(array('required' => false)),
      'observacoes'                   => new sfValidatorString(array('required' => false)),
      'created_at'                    => new sfValidatorDateTime(array('required' => false)),
      'mf_formulario_utilizador_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mf_formulario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'mfFormulario';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['mf_formulario_utilizador_list']))
    {
      $values = array();
      foreach ($this->object->getmfFormularioUtilizadors() as $obj)
      {
        $values[] = $obj->getUtilizadorId();
      }

      $this->setDefault('mf_formulario_utilizador_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->savemfFormularioUtilizadorList($con);
  }

  public function savemfFormularioUtilizadorList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['mf_formulario_utilizador_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(mfFormularioUtilizadorPeer::FORMULARIO_ID, $this->object->getPrimaryKey());
    mfFormularioUtilizadorPeer::doDelete($c, $con);

    $values = $this->getValue('mf_formulario_utilizador_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new mfFormularioUtilizador();
        $obj->setFormularioId($this->object->getPrimaryKey());
        $obj->setUtilizadorId($value);
        $obj->save();
      }
    }
  }

}
