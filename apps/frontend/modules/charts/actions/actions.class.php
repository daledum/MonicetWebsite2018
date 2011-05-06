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
    $species = array();
    $type = $request->getParameter('type');
    $gi_total = GeneralInfoPeer::getTotalForPeriod($type, $request->getParameter('year'), $request->getParameter('month'));

    if($type == '1') {
        $sightings = SightingPeer::getAPUETotals($request->getParameter('year'),
                                                 $request->getParameter('month'));

        $data = array();
        $i = 1;
        
        foreach($sightings as $s) {
            $species[$s[1]] = $s[0];
            $species_ref[$s[1]] = SpeciePeer::retrieveByPK($s[1]);
        }
        $ndata = count($species);
        $i = 1;
        foreach($species as $k => $v) { 
            $pos[$k] = $i;
            $i += 1;
        }
        foreach($species as $k => $v) {
            $categories[] = $species_ref[$k]->getCode();
        }
        foreach($species as $k => $v) {
            $a = array_fill(1, $ndata, 0);
            $a[$pos[$k]] = round(($v / $gi_total) * 100, 0);
            $series[$species_ref[$k]->formattedString()] = $a;
        }
    } else {
        $sightings = SightingPeer::getAPUEVariations($request->getParameter('year'));
        
        foreach($sightings as $s) {
          $species[] = array(0 => $s[0], 1 => $s[1], 2 => $s[2]);
          $series[$s[2]] = array_fill(1, 12, 0);
        }
        foreach($species as $v) {
            $series[$v[2]][$v[1]] = $v[0];
        }
        foreach(range(1, 12) as $monthNumber) {
            $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
        }
        
        /*
        foreach($sightings as $sighting){
          if($sighting->getSpecieId()){
            if(array_key_exists($sighting->getSpecie()->formattedString(), $series)) {
              $ex_date = explode('-', $sighting->getRecord()->getGeneralInfo()->getDate());
              $series[$sighting->getSpecie()->formattedString()][(int)$ex_date[1]] += 1;
            } else {
              $series[$sighting->getSpecie()->formattedString()] = array_fill(1, 12, 0);
            }
          }
        }
        
        foreach($series as $k => $v) {
            foreach($v as $i => $m) {
                $series[$k][$i] = $m/$gi_total;
            }
        }
        
        foreach(range(1, 12) as $monthNumber) {
            $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
        }
        */
    }
    $this->series = $series;
    $this->categories = $categories;
  }
}
