<?php

/**
 * WatchInfo filter form.
 *
 * @package    monicet
 * @subpackage filter
 * @author     Your name here
 */
class WatchInfoFormFilter extends BaseWatchInfoFormFilter
{
  public function configure()
  {
  	$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('watch_info');
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
    
    $criteria->addJoin(WatchInfoPeer::ID, WatchSightingPeer::WATCH_INFO_ID, Criteria::INNER_JOIN);
    $criteria->add(WatchSightingPeer::SPECIE_ID, $value, Criteria::EQUAL);
    $criteria->setDistinct();
  }
}
