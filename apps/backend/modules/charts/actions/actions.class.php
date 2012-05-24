<?php

/**
 * charts actions.
 *
 * @package    monicet
 * @subpackage charts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class chartsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->associations = AssociationPeer::getAssociations();
    $this->behaviours = BehaviourPeer::getBehaviours();
    $this->sea_states = SeaStatePeer::getSeaStates();
    $this->visibilities = VisibilityPeer::getvisibilities();

    $this->firstYear = GeneralInfoPeer::getFirstYear();
    $this->lastYear = GeneralInfoPeer::getLastYear();
    
    $months = array();
    
    foreach(range(1, 12) as $monthNumber) {
        $months[$monthNumber] = date("F", mktime(0, 0, 0, $monthNumber, 1, 2000));
    }
    
    $this->months = $months;
    
    $this->companies = CompanyPeer::doSelect(new Criteria());
    
    if (!$this->getUser()->getGuardUser()->getIsSuperAdmin()) {
        $user = $this->getUser()->getGuardUser();
        $this->user_company = CompanyPeer::doSelectUserCompany($user->getId());
    }
  }
  
  public function executeMonth(sfWebRequest $request)
  {
    $this->associations = AssociationPeer::getAssociations();
    $this->behaviours = BehaviourPeer::getBehaviours();
    $this->sea_states = SeaStatePeer::getSeaStates();
    $this->visibilities = VisibilityPeer::getvisibilities();

    $this->firstYear = GeneralInfoPeer::getFirstYear();
    $this->lastYear = GeneralInfoPeer::getLastYear();
    
    $this->companies = CompanyPeer::doSelect(new Criteria());
    
    if (!$this->getUser()->getGuardUser()->getIsSuperAdmin()) {
        $user = $this->getUser()->getGuardUser();
        $this->user_company = CompanyPeer::doSelectUserCompany($user->getId());
    }
    
  }
  
  public function executeSpecies(sfWebRequest $request) {
  	$this->associations = AssociationPeer::getAssociations();
    $this->behaviours = BehaviourPeer::getBehaviours();
    $this->sea_states = SeaStatePeer::getSeaStates();
    $this->visibilities = VisibilityPeer::getvisibilities();

    $this->firstYear = GeneralInfoPeer::getFirstYear();
    $this->lastYear = GeneralInfoPeer::getLastYear();
    
    $this->companies = CompanyPeer::doSelect(new Criteria());
    
    if (!$this->getUser()->getGuardUser()->getIsSuperAdmin()) {
        $user = $this->getUser()->getGuardUser();
        $this->user_company = CompanyPeer::doSelectUserCompany($user->getId());
    }
    
  }
  
  public function executeDeparture(sfWebRequest $request) {
    $this->associations = AssociationPeer::getAssociations();
    $this->behaviours = BehaviourPeer::getBehaviours();
    $this->sea_states = SeaStatePeer::getSeaStates();
    $this->visibilities = VisibilityPeer::getvisibilities();

    $this->firstYear = GeneralInfoPeer::getFirstYear();
    $this->lastYear = GeneralInfoPeer::getLastYear();
    
    $this->companies = CompanyPeer::doSelect(new Criteria());
    
  }
  
  public function executeTo_iframe(sfWebRequest $request) {
    
    $this->forward404Unless($request->isMethod('post'));
    $this->iframe = new ChartIframeInformation();
    $hash = $this->generateIframeHash();
    while (ChartIframeInformationPeer::retrieveByHash($hash)) {
      $hash = $this->generateIframeHash();
    }
    $this->iframe->setHash($hash);
    $this->iframe->setCompanyId($request->getPostParameter('company_id'));
    $this->iframe->setGraphType($request->getPostParameter('graph_type'));
    $this->iframe->setYear($request->getPostParameter('year'));
    $this->iframe->setMonth($request->getPostParameter('month'));
    $this->iframe->setChartItem($request->getPostParameter('chart-item'));
    $this->iframe->setChartType($request->getPostParameter('chart-type'));
    $this->iframe->setSelected($request->getPostParameter('select-all-toggle'));
    
    $this->iframe->save();
  }
  
  /*
   * Criar um array com as séries ordenadas por ordem decrescente
   */
  public function orderSeriesDesc($series) {
    $totals = array();
    foreach($series as $specie => $values) {
      $total = 0;
      for( $month=1; $month<=12; $month++) {
        $total += $values[$month];
      }
      $totals[$specie] = $total;
    }
    
    // ordenar o array por ordem decrescente
    arsort($totals);
    
    $ordered = array();
    foreach ($totals as $code => $value) {
      $ordered[$code] = $series[$code];
    }
    
    return $ordered;
  }
  
  /*
   * Generate new Hash for the chart iframe
   */
  function generateIframeHash( $length = 10 ) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
      $string .= $characters[mt_rand(0, strlen($characters))];
    }

    return $string;
  }
  
  
}
