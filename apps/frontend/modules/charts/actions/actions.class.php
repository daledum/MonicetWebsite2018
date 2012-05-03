<?php

/**
 * charts actions.
 *
 * @package    monicet
 * @subpackage charts
 * @author     Francisco Cardoso
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class chartsActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->active = 'charts';
    
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
  
  public function executeGet_results(sfWebRequest $request)
  {
    $categories = array();
    $series = array();
    $type = $request->getParameter('type');

    if($type == '1') {
        $gi_total = GeneralInfoPeer::getTotalForPeriod($type, $request->getParameter('year'), $request->getParameter('month'), $request->getParameter('company'));
        $sighted_species = SpeciePeer::getSightedSpeciesOnYearAndMonth($request->getParameter('year'), $request->getParameter('month'), $request->getParameter('company'));
        
        foreach( $sighted_species as $cont => $specie ) {
          $categories[] = $specie->getCode();
          $series[$specie->formattedString()] = array_fill(1, count($sighted_species), 0);
          $numGI = GeneralInfoPeer::countForSpecieOnMonth($specie->getId(), $request->getParameter('year'), $request->getParameter('month'), $request->getParameter('company'));
          $series[$specie->formattedString()][$cont+1] = round(($numGI / $gi_total) * 100, 0);
        }
        
    } else {
      $year = $request->getParameter('year', date('Y')); 
      //$gi_total = GeneralInfoPeer::getTotalForPeriod(2, $year);
      $sighted_species = SpeciePeer::getSightedSpeciesOnYearAndMonth($year, null, $request->getParameter('company'));
      foreach( $sighted_species as $specie ) {
        $series[$specie->formattedString()] = array();
        for( $month=1; $month<=12; $month++) {
          $gi_total = GeneralInfoPeer::getTotalForPeriod(2, $year, $month, $request->getParameter('company'));
          $numGI = GeneralInfoPeer::countForSpecieOnMonth($specie->getId(), $year, $month, $request->getParameter('company'));
          $series[$specie->formattedString()][$month] = round(($numGI / $gi_total) * 100, 0);
        }
      }
      
      foreach(range(1, 12) as $monthNumber) {
          $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
      }
    }
    
    // mostrar todos ou nenhum, ou predefinidamente mostrar as 4 espécies com mais resultados
    if ( $request->getParameter('select_all') != 'custom' ) {
      if ( $request->getParameter('select_all') == 'all' ) {
        $this->counter = count($series);
      }
      else {
        $this->counter = 0;
      }
    }
    else {
      $this->counter = 4;
    }
    
    $this->series = $this->orderSeriesDesc($series);
    $this->categories = $categories;
  }

  public function executeGet_month_results(sfWebRequest $request)
  {
    $series = array();
    
    $year = ($request->getParameter('year'))? $request->getParameter('year') : 0 ;
    
    $g_infos = GeneralInfoPeer::doSelectByPeriod($year, 0);
    $items = array();
    
    if ($this->getUser()->isAuthenticated() && !$this->getUser()->getGuardUser()->getIsSuperAdmin()) {
        $user = $this->getUser()->getGuardUser();
        $company = CompanyPeer::doSelectUserCompany($user->getId());
    }
    else {
        $company = CompanyPeer::retrieveByPK($request->getParameter('company_id'));
    }
    
    if ($request->getParameter('chart-item') == 0) {
        foreach ($g_infos as $gi) {
            if (!in_array($gi->getVesselId(),$items)) {
                $items[] = $gi->getVesselId();
                $data = array();
                if ($vessel = VesselPeer::retrieveByPK($gi->getVesselId())) {
                    
                    $valid = false;
                    if ($this->getUser()->isAuthenticated()) {
                        if ($this->getUser()->getGuardUser()->getIsSuperAdmin()) {
                            if ($company) {
                                if ($vessel->getCompanyId() == $company->getId()) {
                                    $valid = true;
                                }
                            }
                            else{
                                $valid = true;
                            }
                        }
                        else {
                            if ($vessel->getCompanyId() == $company->getId()) {
                                $valid = true;
                            }
                        }
                    }
                    else {
                        if ($company) {
                            if ($vessel->getCompanyId() == $company->getId()) {
                                $valid = true;
                            }
                        }
                        else{
                            $valid = true;
                        }
                    }
                    
                    if ($valid) {
                        for ($i = 1; $i<=12; $i++) {
                            $data[] = $vessel->getTotalMonth($request->getParameter('year', 0), $i);
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
                    
                    $valid = false;
                    if ($this->getUser()->isAuthenticated()) {
                        if ($this->getUser()->getGuardUser()->getIsSuperAdmin()) {
                            if ($company) {
                                if ($guide->getCompanyId() == $company->getId()) {
                                    $valid = true;
                                }
                            }
                            else{
                                $valid = true;
                            }
                        }
                        else {
                            if ($guide->getCompanyId() == $company->getId()) {
                                $valid = true;
                            }
                        }
                    }
                    else {
                      if ($company) {
                          if ($guide->getCompanyId() == $company->getId()) {
                              $valid = true;
                          }
                      }
                      else{
                          $valid = true;
                      }
                    }
                    
                    if ($valid) {
                        for ($i = 1; $i<=12; $i++) {
                            $data[] = $guide->getTotalMonth($request->getParameter('year', 0), $i);
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
    
    // mostrar todos ou nenhum, ou predefinidamente mostrar as 4 séries com mais resultados
    if ( $request->getParameter('select_all') != 'custom' ) {
      if ( $request->getParameter('select_all') == 'all' ) {
        $this->counter = count($series);
      }
      else {
        $this->counter = 0;
      }
    }
    else {
      $this->counter = 4;
    }
    
    $this->series = $this->orderSeriesDesc($series);
    $this->categories = $categories;
  }

  public function executeGet_species_results(sfWebRequest $request)
  {
    
    ini_set("max_execution_time","600");
    
    $series = array();
    
    $year = ($request->getParameter('year'))? $request->getParameter('year') : 0 ;
    
    $g_infos = GeneralInfoPeer::doSelectByPeriod($year, 0);
    $items = array();
    
    if ($this->getUser()->isAuthenticated() && !$this->getUser()->getGuardUser()->getIsSuperAdmin()) {
        $user = $this->getUser()->getGuardUser();
        $company = CompanyPeer::doSelectUserCompany($user->getId());
        $company_id = $company->getId();
    }
    else {
        $company = CompanyPeer::retrieveByPK($request->getParameter('company_id'));
        $company_id = $company ? $company->getId() : 0 ;
    }
    
    foreach ($g_infos as $gi) {
        
        $gi_species = $gi->getSpecies();
        
        foreach ($gi_species as $specie){
            
            $species_id = $specie->getId();
            $gi_company_id = $gi->getCompanyId();
            $valid = false;
            if ($this->getUser()->isAuthenticated()) {
                if ($company_id) {
                    if ($company_id == $gi_company_id) {
                        $valid = true;
                    }
                }
                else{
                    $valid = true;
                }
            }
            else {
              $valid = true;
            }
            
            if ($valid) {
                if (!in_array($species_id,$items)) {
                    $items[] = $species_id;
                    $data = array();
                    for ($i = 1; $i<=12; $i++) {
                        //$data[] = $specie->getTotalMonth($request->getParameter('year'), $i);
                        if ($company) {
                            $data[] = $specie->getTotalMonthCompany($request->getParameter('year'), $i, $company_id);
                        }
                        else {
                            $data[] = $specie->getTotalMonth($request->getParameter('year'), $i);
                        }
                    }
                    $series[$specie->formattedString()] = $data;
                }
            }
        }
    }
    
    foreach(range(1, 12) as $monthNumber) {
        $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
    }
    
    // mostrar todos ou nenhum, ou predefinidamente mostrar as 4 espécies com mais resultados
    if ( $request->getParameter('select_all') != 'custom' ) {
      if ( $request->getParameter('select_all') == 'all' ) {
        $this->counter = count($series);
      }
      else {
        $this->counter = 0;
      }
    }
    else {
      $this->counter = 4;
    }
    
    $this->series = $this->orderSeriesDesc($series);
    $this->categories = $categories;
  }

  public function executeGet_departure_results(sfWebRequest $request)
  {
    $series = array();
    $values = array();
    
    $year = ($request->getParameter('year'))? $request->getParameter('year') : 0 ;
    
    if ($this->getUser()->isAuthenticated() && !$this->getUser()->getGuardUser()->getIsSuperAdmin()) {
        $user = $this->getUser()->getGuardUser();
        $company = CompanyPeer::doSelectUserCompany($user->getId());
    }
    else {
        $company = CompanyPeer::retrieveByPK($request->getParameter('company_id'));
    }
    
    if ($request->getParameter('chart-type') == 0) {
        foreach (range(1, 12) as $monthNumber) {
            $species = array();
            $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
            $g_infos = GeneralInfoPeer::doSelectByPeriod($year, $monthNumber);
            $total = count($g_infos);
            $with_species = 0;
            
            foreach (SpeciePeer::getAllOrdered() as $s) {
                $species[$s->getCode()] = 0;
            }
            
            foreach ($g_infos as $gi) {
                
                $valid = false;
                if ($this->getUser()->isAuthenticated()) {
                    if ($this->getUser()->getGuardUser()->getIsSuperAdmin()) {
                        if ($company) {
                            if ($company->getId() == $gi->getCompanyId()) {
                                $valid = true;
                            }
                        }
                        else{
                            $valid = true;
                        }
                    }
                    else {
                        if ($gi->getCompanyId() == $company->getId()) {
                            $valid = true;
                        }
                    }
                }
                else {
                  $valid = true;
                }
                
                if ($valid) {
                    if (count($gi->getSpecies()) > 0) {
                        $species_counted = array();
                        foreach ($gi->getSpecies() as $s) {
                            if (!in_array($s->getCode(),$species_counted)) {
                                $species[$s->getCode()]++;
                                $species_counted[] = $s->getCode();
                            }
                        }
                    }
                }
            }
            
            foreach (SpeciePeer::getAllOrdered() as $s) {
                $series[$s->getCode()][] = ($total > 0)? round(($species[$s->getCode()]/$total) * 100, 2) : "null";
            }
        }
    }
    elseif ($request->getParameter('chart-type') == 1) {
        foreach (range(1, 12) as $monthNumber) {
            $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
            $g_infos = GeneralInfoPeer::doSelectByPeriod($year, $monthNumber);
            $total = count($g_infos);
            $totalSighted = array();
            
            foreach (SpeciePeer::getAllOrdered() as $s) {
                $totalSighted[$s->getCode()] = 0;
            }
            
            foreach ($g_infos as $gi) {
                
                $valid = false;
                if ($this->getUser()->isAuthenticated()) {
                    if ($this->getUser()->getGuardUser()->getIsSuperAdmin()) {
                        if ($company) {
                            if ($company->getId() == $gi->getCompanyId()) {
                                $valid = true;
                            }
                        }
                        else{
                            $valid = true;
                        }
                    }
                    else {
                        if ($gi->getCompanyId() == $company->getId()) {
                            $valid = true;
                        }
                    }
                }
                else {
                  $valid = true;
                }
                
                if ($valid) {
                    foreach (SpeciePeer::getAllOrdered() as $s) {
                        $totalSighted[$s->getCode()] += $gi->getTotalSighted($s->getId());
                    }
                }
            }
            
            foreach (SpeciePeer::getAllOrdered() as $s) {
                $series[$s->getCode()][] = ($total > 0)? round(($totalSighted[$s->getCode()]/$total), 0) : "null";
            }
        }
    }
    
    // mostrar todos ou nenhum, ou predefinidamente mostrar as 4 séries com mais resultados
    if ( $request->getParameter('select_all') != 'custom' ) {
      if ( $request->getParameter('select_all') == 'all' ) {
        $this->counter = count($series);
      }
      else {
        $this->counter = 0;
      }
    }
    else {
      $this->counter = 4;
    }
    
    $this->series = $this->orderSeriesDesc($series);
    $this->categories = $categories;
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
  
  public function executeIframe(sfWebRequest $request) {
    
    if ($request->getParameter('hash')) {
      $iframe = ChartIframeInformationPeer::retrieveByHash($request->getParameter('hash'));
      $this->forward404Unless($iframe);
      
      $this->company_id = $iframe->getCompanyId();
      $this->year = $iframe->getYear();
      $this->select_all_toggle = $iframe->getSelected();
      
      if ($iframe->getGraphType() == 'month') {
        $this->chart_item = $iframe->getChartItem();
        $this->setTemplate('iframeMonth');
      }
      elseif ($iframe->getGraphType() == 'species') {
        $this->chart_type = $iframe->getChartType();
        $this->setTemplate('iframeSpecies');
      }
      elseif ($iframe->getGraphType() == 'departure') {
        $this->chart_type = $iframe->getChartType();
        $this->setTemplate('iframeDeparture');
      }
      else {
        $this->forward404();
      }
    }
    elseif ($request->getParameter('graph_type') == 'apue') {
      $this->chart_type = $request->getParameter('chart_type');
      $this->year = $request->getParameter('year');
      $this->month = $request->getParameter('month');
      $this->company_id = $request->getParameter('company_id');
      $this->select_all_toggle = $request->getParameter('select_all_toggle');
      $this->setTemplate('iframeAPUE');
    }
    else {
      $this->forward404();
    }
    
    
    
  }
  
}
