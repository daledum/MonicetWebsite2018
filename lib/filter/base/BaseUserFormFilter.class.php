<?php

/**
 * User filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'      => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lastname'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'birthday'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'bi'           => new sfWidgetFormFilterInput(),
      'nif'          => new sfWidgetFormFilterInput(),
      'country'      => new sfWidgetFormFilterInput(),
      'island'       => new sfWidgetFormFilterInput(),
      'county'       => new sfWidgetFormFilterInput(),
      'locality'     => new sfWidgetFormFilterInput(),
      'address'      => new sfWidgetFormFilterInput(),
      'zipcode'      => new sfWidgetFormFilterInput(),
      'telephone'    => new sfWidgetFormFilterInput(),
      'mobile'       => new sfWidgetFormFilterInput(),
      'email'        => new sfWidgetFormFilterInput(),
      'url'          => new sfWidgetFormFilterInput(),
      'lang'         => new sfWidgetFormFilterInput(),
      'photo'        => new sfWidgetFormFilterInput(),
      'situation'    => new sfWidgetFormFilterInput(),
      'observations' => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'user_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'name'         => new sfValidatorPass(array('required' => false)),
      'lastname'     => new sfValidatorPass(array('required' => false)),
      'birthday'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'bi'           => new sfValidatorPass(array('required' => false)),
      'nif'          => new sfValidatorPass(array('required' => false)),
      'country'      => new sfValidatorPass(array('required' => false)),
      'island'       => new sfValidatorPass(array('required' => false)),
      'county'       => new sfValidatorPass(array('required' => false)),
      'locality'     => new sfValidatorPass(array('required' => false)),
      'address'      => new sfValidatorPass(array('required' => false)),
      'zipcode'      => new sfValidatorPass(array('required' => false)),
      'telephone'    => new sfValidatorPass(array('required' => false)),
      'mobile'       => new sfValidatorPass(array('required' => false)),
      'email'        => new sfValidatorPass(array('required' => false)),
      'url'          => new sfValidatorPass(array('required' => false)),
      'lang'         => new sfValidatorPass(array('required' => false)),
      'photo'        => new sfValidatorPass(array('required' => false)),
      'situation'    => new sfValidatorPass(array('required' => false)),
      'observations' => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'user_id'      => 'ForeignKey',
      'name'         => 'Text',
      'lastname'     => 'Text',
      'birthday'     => 'Date',
      'bi'           => 'Text',
      'nif'          => 'Text',
      'country'      => 'Text',
      'island'       => 'Text',
      'county'       => 'Text',
      'locality'     => 'Text',
      'address'      => 'Text',
      'zipcode'      => 'Text',
      'telephone'    => 'Text',
      'mobile'       => 'Text',
      'email'        => 'Text',
      'url'          => 'Text',
      'lang'         => 'Text',
      'photo'        => 'Text',
      'situation'    => 'Text',
      'observations' => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
