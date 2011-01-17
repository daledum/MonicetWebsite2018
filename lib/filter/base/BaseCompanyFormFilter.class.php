<?php

/**
 * Company filter form base class.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCompanyFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'acronym'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'base_latitude'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'base_longitude'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url'               => new sfWidgetFormFilterInput(),
      'telephone'         => new sfWidgetFormFilterInput(),
      'mobile'            => new sfWidgetFormFilterInput(),
      'fax'               => new sfWidgetFormFilterInput(),
      'email'             => new sfWidgetFormFilterInput(),
      'address'           => new sfWidgetFormFilterInput(),
      'zipcode'           => new sfWidgetFormFilterInput(),
      'district'          => new sfWidgetFormFilterInput(),
      'municipality'      => new sfWidgetFormFilterInput(),
      'locality'          => new sfWidgetFormFilterInput(),
      'observations'      => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'company_user_list' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'              => new sfValidatorPass(array('required' => false)),
      'acronym'           => new sfValidatorPass(array('required' => false)),
      'base_latitude'     => new sfValidatorPass(array('required' => false)),
      'base_longitude'    => new sfValidatorPass(array('required' => false)),
      'url'               => new sfValidatorPass(array('required' => false)),
      'telephone'         => new sfValidatorPass(array('required' => false)),
      'mobile'            => new sfValidatorPass(array('required' => false)),
      'fax'               => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'address'           => new sfValidatorPass(array('required' => false)),
      'zipcode'           => new sfValidatorPass(array('required' => false)),
      'district'          => new sfValidatorPass(array('required' => false)),
      'municipality'      => new sfValidatorPass(array('required' => false)),
      'locality'          => new sfValidatorPass(array('required' => false)),
      'observations'      => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'company_user_list' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('company_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addCompanyUserListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(CompanyUserPeer::COMPANY_ID, CompanyPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CompanyUserPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CompanyUserPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Company';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'name'              => 'Text',
      'acronym'           => 'Text',
      'base_latitude'     => 'Text',
      'base_longitude'    => 'Text',
      'url'               => 'Text',
      'telephone'         => 'Text',
      'mobile'            => 'Text',
      'fax'               => 'Text',
      'email'             => 'Text',
      'address'           => 'Text',
      'zipcode'           => 'Text',
      'district'          => 'Text',
      'municipality'      => 'Text',
      'locality'          => 'Text',
      'observations'      => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'company_user_list' => 'ManyKey',
    );
  }
}
