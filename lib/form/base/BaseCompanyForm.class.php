<?php

/**
 * Company form base class.
 *
 * @method Company getObject() Returns the current form's model object
 *
 * @package    monicet
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCompanyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'name'              => new sfWidgetFormInputText(),
      'acronym'           => new sfWidgetFormInputText(),
      'base_latitude'     => new sfWidgetFormInputText(),
      'base_longitude'    => new sfWidgetFormInputText(),
      'url'               => new sfWidgetFormInputText(),
      'telephone'         => new sfWidgetFormInputText(),
      'mobile'            => new sfWidgetFormInputText(),
      'fax'               => new sfWidgetFormInputText(),
      'email'             => new sfWidgetFormInputText(),
      'address'           => new sfWidgetFormTextarea(),
      'zipcode'           => new sfWidgetFormInputText(),
      'district'          => new sfWidgetFormInputText(),
      'municipality'      => new sfWidgetFormInputText(),
      'locality'          => new sfWidgetFormInputText(),
      'observations'      => new sfWidgetFormTextarea(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'company_user_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Company', 'column' => 'id', 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 255)),
      'acronym'           => new sfValidatorString(array('max_length' => 45)),
      'base_latitude'     => new sfValidatorString(array('max_length' => 45)),
      'base_longitude'    => new sfValidatorString(array('max_length' => 45)),
      'url'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telephone'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'mobile'            => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'fax'               => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'email'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'zipcode'           => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'district'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'municipality'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'locality'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'observations'      => new sfValidatorString(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
      'company_user_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('company[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Company';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['company_user_list']))
    {
      $values = array();
      foreach ($this->object->getCompanyUsers() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('company_user_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveCompanyUserList($con);
  }

  public function saveCompanyUserList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['company_user_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(CompanyUserPeer::COMPANY_ID, $this->object->getPrimaryKey());
    CompanyUserPeer::doDelete($c, $con);

    $values = $this->getValue('company_user_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CompanyUser();
        $obj->setCompanyId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save();
      }
    }
  }

}
