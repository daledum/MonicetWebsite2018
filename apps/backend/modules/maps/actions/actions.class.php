<?php

/**
 * maps actions.
 *
 * @package    monicet
 * @subpackage maps
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mapsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
    
    if(!$this->getUser()->isSuperAdmin()){
      $user = $this->getUser()->getGuardUser();
      $this->user_company = CompanyPeer::doSelectUserCompany($user->getId());
    }
    
    $this->speciesList = SpeciePeer::getAllOrdered();
    
    $this->companies = CompanyPeer::doSelectByCompany();
    $this->associations = AssociationPeer::getAssociations();
    $this->behaviours = BehaviourPeer::getBehaviours();
    $this->sea_states = SeaStatePeer::getSeaStates();
    $this->visibilities = VisibilityPeer::getvisibilities();
    
    $c = new Criteria();
    $c->addAscendingOrderByColumn(GeneralInfoPeer::DATE);
    $c->addAnd(GeneralInfoPeer::VALID, true, Criteria::EQUAL);
    $firstGI = GeneralInfoPeer::doSelectOne($c);
    $c = new Criteria();
    $c->addDescendingOrderByColumn(GeneralInfoPeer::DATE);
    $c->addAnd(GeneralInfoPeer::VALID, true, Criteria::EQUAL);
    $lastGI = GeneralInfoPeer::doSelectOne($c);
    
    $explodedLastDate = explode('-', $lastGI->getDate());
    $explodedFirstDate = explode('-', $firstGI->getDate());
    $this->firstYear = $explodedFirstDate[0];
    $this->lastYear = $explodedLastDate[0];
    
    $months = array();
    
    foreach(range(1, 12) as $monthNumber) {
        $months[$monthNumber] = date("F", mktime(0, 0, 0, $monthNumber, 1, 2000));
    }
    
    $this->months = $months;
    
    $this->islands = array(
      'São Miguel' => 'smiguel',
      'Santa Maria' => 'smaria',
      'Terceira' => 'terceira',
      'Pico' => 'pico',
      'Faial' => 'faial',
      'São Jorge' => 'sjorge',
      'Graciosa' => 'graciosa',
      'Flores' => 'flores',
      'Corvo' => 'corvo'
    );
  }
  
  public function executeTime(sfWebRequest $request){
    
    if(!$this->getUser()->isSuperAdmin()){
      $user = $this->getUser()->getGuardUser();
      $this->user_company = CompanyPeer::doSelectUserCompany($user->getId());
    }
    
    $this->speciesList = SpeciePeer::getAllOrdered();
    
    $this->companies = CompanyPeer::doSelectByCompany();
    $this->associations = AssociationPeer::getAssociations();
    $this->behaviours = BehaviourPeer::getBehaviours();
    $this->sea_states = SeaStatePeer::getSeaStates();
    $this->visibilities = VisibilityPeer::getvisibilities();
    
    $c = new Criteria();
    $c->addAscendingOrderByColumn(GeneralInfoPeer::DATE);
    $c->addAnd(GeneralInfoPeer::VALID, true, Criteria::EQUAL);
    $firstGI = GeneralInfoPeer::doSelectOne($c);
    $c = new Criteria();
    $c->addDescendingOrderByColumn(GeneralInfoPeer::DATE);
    $c->addAnd(GeneralInfoPeer::VALID, true, Criteria::EQUAL);
    $lastGI = GeneralInfoPeer::doSelectOne($c);
    
    $explodedLastDate = explode('-', $lastGI->getDate());
    $explodedFirstDate = explode('-', $firstGI->getDate());
    $this->firstYear = $explodedFirstDate[0];
    $this->lastYear = $explodedLastDate[0];
    
    $months = array();
    
    foreach(range(1, 12) as $monthNumber) {
        $months[$monthNumber] = date("F", mktime(0, 0, 0, $monthNumber, 1, 2000));
    }
    
    $this->months = $months;
    
    $this->islands = array(
      'São Miguel' => 'smiguel',
      'Santa Maria' => 'smaria',
      'Terceira' => 'terceira',
      'Pico' => 'pico',
      'Faial' => 'faial',
      'São Jorge' => 'sjorge',
      'Graciosa' => 'graciosa',
      'Flores' => 'flores',
      'Corvo' => 'corvo'
    );
  }
  
  public function executeGInfoMap(sfWebRequest $request) {
    $this->general_info = GeneralInfoPeer::retrieveByPk($request->getParameter('general_info_id'));
    $this->forward404Unless($this->general_info);
    
    if(!$this->getUser()->isSuperAdmin()){
      $user = $this->getUser()->getGuardUser();
      $this->user_company = CompanyPeer::doSelectUserCompany($user->getId());
      $this->forward404Unless($this->user_company->getId() == $this->general_info->getCompanyId());
    }
  }
  
  public function executeGInfoPublicMap(sfWebRequest $request) {
    $this->general_info = GeneralInfoPeer::retrieveByPk($request->getParameter('general_info_id'));
    $this->forward404Unless($this->general_info);
    
    if(!$this->getUser()->isSuperAdmin()){
      $user = $this->getUser()->getGuardUser();
      $this->user_company = CompanyPeer::doSelectUserCompany($user->getId());
    }
  }
  
  public function executeGInfoResults(sfWebRequest $request) {
    
    $this->general_info = GeneralInfoPeer::retrieveByPk($request->getParameter('general_info_id'));
    
    $this->sightings = SightingPeer::getByGeneralInfoIdForMap($request);
    
    $this->species = array();
    $this->species[] = SpeciePeer::retrieveByPk($this->sightings[0]->getSpecieId());
    
    foreach($this->sightings as $sighting) {
      if (end($this->species)->getId() != $sighting->getSpecieId()){
        $this->species[] = SpeciePeer::retrieveByPk($sighting->getSpecieId());
      }
    }
    
    
  }
  
  public function executeTo_iframe(sfWebRequest $request) {
    
    $this->forward404Unless($request->isMethod('post'));
    
    $this->company = $request->getPostParameter('company');
    
    $item = MapIframeInformationPeer::retrieveByCompany($company);
    if ($item) {
      $hash = $item->getHash();
    }
    else {
      $hash = mfUtils::generateIframeHash();
      
      $iframe = new MapIframeInformation();
      $iframe->setHash($hash);
      $iframe->setCompanyId($this->company);
      $iframe->save();
    }
    
    $this->iframe_url = '/en/mapsIframe?hash='.$hash;
  }
  
}
