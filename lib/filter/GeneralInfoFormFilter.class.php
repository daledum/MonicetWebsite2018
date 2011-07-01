<?php

/**
 * GeneralInfo filter form.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class GeneralInfoFormFilter extends BaseGeneralInfoFormFilter
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('general_info');
    unset(
      $this['created_at'], $this['updated_at']
    );
    
    $user = sfContext::getInstance()->getUser()->getGuardUser();
    $company = CompanyPeer::doSelectUserCompany($user->getId());
    
    if($company){
      $this->setWidget('company_id', new sfWidgetFormChoice(array('choices' => array($company->getId() => $company->getName()))));
    }
    
    
    $this->widgetSchema['species'] =  new sfWidgetFormPropelChoice(array('model' => 'Specie', 'add_empty' => true));
    $this->validatorSchema['species'] = new sfValidatorPropelChoice(array('required' => false, 'model' => 'Specie', 'column' => 'id'));
    
    
  }
  
  
  protected function addSpeciesColumnCriteria(Criteria $criteria, $field, $values){
      
    if (!is_array($values))
    {
        $values = array($values);
    }
    
    if (!count($values))
    {
        return;
    }
    
    $value = array_pop($values);
    
    /*switch($value){
    case 1:
        $criterion = $criteria->getNewCriterion(FacturasPeer::ID_USER, null,Criteria::ISNOTNULL);
    break;
    case 0:
        $criterion = $criteria->getNewCriterion(FacturasPeer::ID_USER, null,Criteria::ISNULL);
    break;
    }
    
    $criteria->add($criterion);*/
    
    
    $criteria->addJoin(GeneralInfoPeer::ID, RecordPeer::GENERAL_INFO_ID, Criteria::INNER_JOIN);
    $criteria->addJoin(RecordPeer::ID, SightingPeer::RECORD_ID, Criteria::INNER_JOIN);
    $criteria->add(SightingPeer::SPECIE_ID, $value, Criteria::EQUAL);
    $criteria->setDistinct();
  }
  
  
  
}
