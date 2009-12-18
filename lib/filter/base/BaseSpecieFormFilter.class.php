<?php

/**
 * Specie filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSpecieFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'specie_group_id' => new sfWidgetFormPropelChoice(array('model' => 'SpecieGroup', 'add_empty' => true)),
      'code'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'specie_group_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SpecieGroup', 'column' => 'id')),
      'code'            => new sfValidatorPass(array('required' => false)),
      'name'            => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('specie_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Specie';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'specie_group_id' => 'ForeignKey',
      'code'            => 'Text',
      'name'            => 'Text',
    );
  }
}
