<?php

/**
 * mfMenu filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BasemfMenuFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nome'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'menu_pai_id'  => new sfWidgetFormPropelChoice(array('model' => 'mfMenu', 'add_empty' => true)),
      'rota'         => new sfWidgetFormFilterInput(),
      'permissao_id' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardPermission', 'add_empty' => true)),
      'posicao'      => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'nome'         => new sfValidatorPass(array('required' => false)),
      'menu_pai_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'mfMenu', 'column' => 'id')),
      'rota'         => new sfValidatorPass(array('required' => false)),
      'permissao_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardPermission', 'column' => 'id')),
      'posicao'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('mf_menu_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'mfMenu';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'nome'         => 'Text',
      'menu_pai_id'  => 'ForeignKey',
      'rota'         => 'Text',
      'permissao_id' => 'ForeignKey',
      'posicao'      => 'Number',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
