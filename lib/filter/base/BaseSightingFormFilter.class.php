<?php

/**
 * Sighting filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSightingFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'record_id'      => new sfWidgetFormPropelChoice(array('model' => 'Record', 'add_empty' => true)),
      'specie_id'      => new sfWidgetFormPropelChoice(array('model' => 'Specie', 'add_empty' => true)),
      'behaviour_id'   => new sfWidgetFormPropelChoice(array('model' => 'Behaviour', 'add_empty' => true)),
      'association_id' => new sfWidgetFormPropelChoice(array('model' => 'Association', 'add_empty' => true)),
      'adults'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'juveniles'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cubs'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'record_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Record', 'column' => 'id')),
      'specie_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Specie', 'column' => 'id')),
      'behaviour_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Behaviour', 'column' => 'id')),
      'association_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Association', 'column' => 'id')),
      'adults'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'juveniles'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cubs'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('sighting_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sighting';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'record_id'      => 'ForeignKey',
      'specie_id'      => 'ForeignKey',
      'behaviour_id'   => 'ForeignKey',
      'association_id' => 'ForeignKey',
      'adults'         => 'Number',
      'juveniles'      => 'Number',
      'cubs'           => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
