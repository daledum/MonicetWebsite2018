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

    $c = new Criteria();
    $c->addAscendingOrderByColumn(GeneralInfoPeer::DATE);
    $firstGI = GeneralInfoPeer::doSelectOne($c);
    $c = new Criteria();
    $c->addDescendingOrderByColumn(GeneralInfoPeer::DATE);
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
  
  public function executeMonth(sfWebRequest $request)
  {
    $this->associations = AssociationPeer::getAssociations();
    $this->behaviours = BehaviourPeer::getBehaviours();
    $this->sea_states = SeaStatePeer::getSeaStates();
    $this->visibilities = VisibilityPeer::getvisibilities();

    $c = new Criteria();
    $c->addAscendingOrderByColumn(GeneralInfoPeer::DATE);
    $firstGI = GeneralInfoPeer::doSelectOne($c);
    $c = new Criteria();
    $c->addDescendingOrderByColumn(GeneralInfoPeer::DATE);
    $lastGI = GeneralInfoPeer::doSelectOne($c);
    
    $explodedLastDate = explode('-', $lastGI->getDate());
    $explodedFirstDate = explode('-', $firstGI->getDate());
    $this->firstYear = $explodedFirstDate[0];
    $this->lastYear = $explodedLastDate[0];
    
  }
  
  public function executeSpecies(sfWebRequest $request) {
  	$this->associations = AssociationPeer::getAssociations();
    $this->behaviours = BehaviourPeer::getBehaviours();
    $this->sea_states = SeaStatePeer::getSeaStates();
    $this->visibilities = VisibilityPeer::getvisibilities();

    $c = new Criteria();
    $c->addAscendingOrderByColumn(GeneralInfoPeer::DATE);
    $firstGI = GeneralInfoPeer::doSelectOne($c);
    $c = new Criteria();
    $c->addDescendingOrderByColumn(GeneralInfoPeer::DATE);
    $lastGI = GeneralInfoPeer::doSelectOne($c);
    
    $explodedLastDate = explode('-', $lastGI->getDate());
    $explodedFirstDate = explode('-', $firstGI->getDate());
    $this->firstYear = $explodedFirstDate[0];
    $this->lastYear = $explodedLastDate[0];
    
  }
  
  public function executeDeparture(sfWebRequest $request) {
    $this->associations = AssociationPeer::getAssociations();
    $this->behaviours = BehaviourPeer::getBehaviours();
    $this->sea_states = SeaStatePeer::getSeaStates();
    $this->visibilities = VisibilityPeer::getvisibilities();

    $c = new Criteria();
    $c->addAscendingOrderByColumn(GeneralInfoPeer::DATE);
    $firstGI = GeneralInfoPeer::doSelectOne($c);
    $c = new Criteria();
    $c->addDescendingOrderByColumn(GeneralInfoPeer::DATE);
    $lastGI = GeneralInfoPeer::doSelectOne($c);
    
    $explodedLastDate = explode('-', $lastGI->getDate());
    $explodedFirstDate = explode('-', $firstGI->getDate());
    $this->firstYear = $explodedFirstDate[0];
    $this->lastYear = $explodedLastDate[0];
    
  }
  
  public function executeGet_month_results(sfWebRequest $request)
  {
    $series = array();
    
    $g_infos = GeneralInfoPeer::doSelectByPeriod($request->getParameter('year'), 0);
    $items = array();
    
    if (!$this->getUser()->getGuardUser()->getIsSuperAdmin()) {
        $user = $this->getUser()->getGuardUser();
        $company = CompanyPeer::doSelectUserCompany($user->getId());
    }
    
    if ($request->getParameter('chart-item') == 0) {
        foreach ($g_infos as $gi) {
            if (!in_array($gi->getVesselId(),$items)) {
                $items[] = $gi->getVesselId();
                $data = array();
                if ($vessel = VesselPeer::retrieveByPK($gi->getVesselId())) {
                    if ($this->getUser()->getGuardUser()->getIsSuperAdmin() || $vessel->getCompanyId() == $company->getId()) {
                        for ($i = 1; $i<=12; $i++) {
                            $data[] = $vessel->getTotalMonth($request->getParameter('year'), $i);
                        }
                        $series[$vessel->getName()] = $data;
                    }
                }
            }
        }
    }
    elseif ($request->getParameter('chart-item') == 1) {
        foreach ($g_infos as $gi) {
            if (!in_array($gi->getGuideId(),$items)) {
                $items[] = $gi->getGuideId();
                $data = array();
                if ($guide = GuidePeer::retrieveByPK($gi->getGuideId())) {
                    if ($this->getUser()->getGuardUser()->getIsSuperAdmin() || $guide->getCompanyId() == $company->getId()) {
                        for ($i = 1; $i<=12; $i++) {
                            $data[] = $guide->getTotalMonth($request->getParameter('year'), $i);
                        }
                        $series[$guide->getName()] = $data;
                    }
                }
            }
        }
    }
    
    foreach(range(1, 12) as $monthNumber) {
        $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
    }
    $this->series = $series;
    $this->categories = $categories;
  }

  public function executeGet_species_results(sfWebRequest $request)
  {
    $series = array();
    
    $g_infos = GeneralInfoPeer::doSelectByPeriod($request->getParameter('year'), 0);
    $items = array();
    
    if (!$this->getUser()->getGuardUser()->getIsSuperAdmin()) {
        $user = $this->getUser()->getGuardUser();
        $company = CompanyPeer::doSelectUserCompany($user->getId());
    }
    
    foreach ($g_infos as $gi) {
        foreach ($gi->getSpecies() as $specie){
            if ($this->getUser()->getGuardUser()->getIsSuperAdmin() || $gi->getCompanyId() == $company->getId()) {
                if (!in_array($specie->getId(),$items)) {
                    $items[] = $specie->getId();
                    $data = array();
                    for ($i = 1; $i<=12; $i++) {
                        $data[] = $specie->getTotalMonth($request->getParameter('year'), $i);
                    }
                    $series[$specie->formattedString()] = $data;
                }
            }
        }
    }
    
    foreach(range(1, 12) as $monthNumber) {
        $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
    }
    $this->series = $series;
    $this->categories = $categories;
  }

  public function executeGet_departure_results(sfWebRequest $request)
  {
    $series = array();
    $values = array();
    
    if (!$this->getUser()->getGuardUser()->getIsSuperAdmin()) {
        $user = $this->getUser()->getGuardUser();
        $company = CompanyPeer::doSelectUserCompany($user->getId());
    }
    
    if ($request->getParameter('chart-type') == 0) {
        foreach (range(1, 12) as $monthNumber) {
            $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
            $g_infos = GeneralInfoPeer::doSelectByPeriod($request->getParameter('year'), $monthNumber);
            $total = count($g_infos);
            $with_species = 0;
            foreach ($g_infos as $gi) {
                if ($this->getUser()->getGuardUser()->getIsSuperAdmin() || $gi->getCompanyId() == $company->getId()) {
                    if (count($gi->getSpecies()) > 0) {
                        $with_species ++;
                    }
                }
            }
            
            $values[] = ($total > 0)? round(($with_species/$total) * 100, 2) : "null";
        }
    }
    elseif ($request->getParameter('chart-type') == 1) {
        foreach (range(1, 12) as $monthNumber) {
            $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
            $g_infos = GeneralInfoPeer::doSelectByPeriod($request->getParameter('year'), $monthNumber);
            $total = count($g_infos);
            $totalSighted = 0;
            foreach ($g_infos as $gi) {
                if ($this->getUser()->getGuardUser()->getIsSuperAdmin() || $gi->getCompanyId() == $company->getId()) {
                    $totalSighted += $gi->getTotalSighted();
                }
            }
            
            $values[] = ($total > 0)? round(($totalSighted/$total), 0) : "null";
        }
    }
    
    
    $series['values'] = $values;
    
    $this->series = $series;
    $this->categories = $categories;
  }
  
}
