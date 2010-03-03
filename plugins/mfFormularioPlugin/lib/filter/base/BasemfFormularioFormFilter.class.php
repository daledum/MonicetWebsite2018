<?php

/**
 * mfFormulario filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasemfFormularioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'regra'                         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'visivel'                       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'ao_editar'                     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'ao_criar'                      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'observacoes'                   => new sfWidgetFormFilterInput(),
      'created_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'mf_formulario_utilizador_list' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'regra'                         => new sfValidatorPass(array('required' => false)),
      'visivel'                       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'ao_editar'                     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'ao_criar'                      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'observacoes'                   => new sfValidatorPass(array('required' => false)),
      'created_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'mf_formulario_utilizador_list' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mf_formulario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addmfFormularioUtilizadorListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(mfFormularioUtilizadorPeer::FORMULARIO_ID, mfFormularioPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(mfFormularioUtilizadorPeer::UTILIZADOR_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(mfFormularioUtilizadorPeer::UTILIZADOR_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'mfFormulario';
  }

  public function getFields()
  {
    return array(
      'id'                            => 'Number',
      'regra'                         => 'Text',
      'visivel'                       => 'Boolean',
      'ao_editar'                     => 'Boolean',
      'ao_criar'                      => 'Boolean',
      'observacoes'                   => 'Text',
      'created_at'                    => 'Date',
      'mf_formulario_utilizador_list' => 'ManyKey',
    );
  }
}
