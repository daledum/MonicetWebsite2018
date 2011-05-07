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
    $this->active = 'maps';
    
    $this->speciesList = SpeciePeer::getAllOrderedFrontend();
    
    
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
    
  }
  
  public function executeTime(sfWebRequest $request){
    
    $this->active = 'maps';
    
    $this->speciesList = SpeciePeer::getAllOrderedFrontend();
    
    
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
  }
  
  
  public function executeAuto_complete(sfWebRequest $request){
    //$this->result = SpeciePeer::getSpecieQuery($request->getParameter('term'));
    //return sfView::NONE;
    
    $this->result = SpeciePeer::getSpecieQuery($request->getParameter('specie_id'));
  }
  
  
  public function executeGet_results(sfWebRequest $request){
    
    $this->specie = SpeciePeer::retrieveByPk($request->getParameter('specie_id'));
    
    //$this->sightings = SightingPeer::getBySpecie($request->getParameter('specie_id'));
    $this->sightings = SightingPeer::getForMap($request);
  }
  
  
}
