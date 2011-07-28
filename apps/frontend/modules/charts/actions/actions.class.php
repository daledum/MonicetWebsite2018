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
    $species_ref = array();
    $type = $request->getParameter('type');

    if($type == '1') {
        $gi_total = GeneralInfoPeer::getTotalForPeriod($type, $request->getParameter('year'), $request->getParameter('month'));
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
        foreach($species_ref as $v) {
            $categories[] = $v->getCode();
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
          $species_ref[$s[2]] = SpeciePeer::retrieveByPK($s[2]);
          $series[$species_ref[$s[2]]->formattedString()] = array_fill(1, 12, 0);
        }
        foreach($species as $v) {
            $gi_total = GeneralInfoPeer::getTotalForPeriod(2, $request->getParameter('year'), $v[1]);
            $series[$species_ref[$v[2]]->formattedString()][$v[1]] = round(($v[0] / $gi_total) * 100, 0);
        }
        foreach(range(1, 12) as $monthNumber) {
            $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
        }
        //echo "<pre>";print_r($species);echo "</pre>";
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


  public function executeGet_month_results(sfWebRequest $request)
  {
    $categories = array('Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez');
    $series = array();
    $species = array();
    $species_ref = array();
    $type = $request->getParameter('type');
    
    
    $sightings = SightingPeer::getAPUEVariations($request->getParameter('year'));
    foreach($sightings as $s) {
      $species[] = array(0 => $s[0], 1 => $s[1], 2 => $s[2]);
      $species_ref[$s[2]] = SpeciePeer::retrieveByPK($s[2]);
      $series[$species_ref[$s[2]]->getCode()] = array_fill(1, 12, 0);
    }
    foreach($species as $v) {
        $gi_total = GeneralInfoPeer::getTotalForPeriod(2, $request->getParameter('year'), $v[1]);
        $series[$species_ref[$v[2]]->getCode()][$v[1]] = $gi_total;
    }
    foreach(range(1, 12) as $monthNumber) {
        $categories[] = date("M", mktime(0, 0, 0, $monthNumber, 1, 2000));
    }
    $this->series = $series;
    $this->categories = $categories;
  }

}
